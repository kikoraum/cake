<?php
// ===== Приём заявки из формы на сайте. Сюда JavaScript отправляет данные =====
require __DIR__ . '/config.php';
header('Content-Type: application/json; charset=utf-8');

function answer(bool $ok, string $msg = '', int $code = 200): void
{
    http_response_code($code);
    echo json_encode(['ok' => $ok, 'error' => $msg], JSON_UNESCAPED_UNICODE);
    exit;
}

// Принимаем только POST (не открытие страницы по ссылке)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    answer(false, 'Метод не разрешён', 405);
}

// 1. Ловушка для ботов: если скрытое поле заполнено — делаем вид, что всё хорошо, но ничего не сохраняем
if (!empty($_POST['website'])) {
    answer(true);
}

// 2. Без согласия на обработку персональных данных заявку не принимаем (152-ФЗ).
//    Проверяем ещё и на сервере: JavaScript в браузере можно обойти.
if (empty($_POST['consent'])) {
    answer(false, 'Нужно согласие на обработку персональных данных', 400);
}

// 3. Очистка: убираем пробелы по краям и символы < >
$clean = fn($s) => trim(str_replace(['<', '>'], '', (string)$s));

$event    = $clean($_POST['event_type'] ?? '');
$products = $clean($_POST['products_desc'] ?? '');
$wishes   = $clean($_POST['wishes'] ?? '');
$name     = $clean($_POST['name'] ?? '');
$phone    = $clean($_POST['phone'] ?? '');

// 4. Проверка данных на СЕРВЕРЕ (проверка в браузере — только для удобства, обойти её легко)
$events = ['День Рождения', 'Юбилей', 'Свадьба', 'Корпоративное мероприятие', 'Другое'];
if (!in_array($event, $events, true)) {
    answer(false, 'Неверный тип события');
}
if (mb_strlen($products) < 3 || mb_strlen($products) > 200) {
    answer(false, 'Неверное описание изделий');
}
if (mb_strlen($wishes) > 1000) {
    answer(false, 'Слишком длинный текст пожеланий');
}
if (!preg_match('/^[\p{L}\s\'\-]{2,60}$/u', $name)) {
    answer(false, 'Неверное имя');
}
if (!preg_match('/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/', $phone)) {
    answer(false, 'Неверный телефон');
}

// 5. Сохраняем в базу ПОДГОТОВЛЕННЫМ запросом: значения подставляются отдельно от SQL-кода,
//    поэтому SQL-инъекция (внедрение чужих команд в базу) невозможна.
try {
    $stmt = db()->prepare(
        'INSERT INTO requests (event_type, products, wishes, name, phone, consent)
         VALUES (:event_type, :products, :wishes, :name, :phone, 1)'
    );
    $stmt->execute([
        ':event_type' => $event,
        ':products'   => $products,
        ':wishes'     => $wishes,
        ':name'       => $name,
        ':phone'      => $phone,
    ]);
    answer(true);
} catch (PDOException $ex) {
    // Пользователю не показываем технические подробности ошибки — это тоже вопрос безопасности
    answer(false, 'Ошибка сервера, попробуйте позже', 500);
}
