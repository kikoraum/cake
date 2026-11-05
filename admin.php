<?php
// ===== Админка: Заявки, Пользователи, Новости =====
session_set_cookie_params(['httponly' => true, 'samesite' => 'Strict']);
session_start();
require __DIR__ . '/config.php';

header('X-Frame-Options: DENY');
header('X-Robots-Tag: noindex, nofollow');

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
function csrf_ok(): bool {
    return hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '');
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

$error = '';
$msg = '';

// ===== ОБРАБОТКА ВХОДА =====
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'login') {
    if (!csrf_ok()) {
        $error = 'Ошибка формы, обновите страницу';
    } else {
        $login = trim($_POST['login'] ?? '');
        $stmt = db()->prepare('SELECT * FROM users WHERE login = :login');
        $stmt->execute([':login' => $login]);
        $user = $stmt->fetch();

        if ($user && password_verify($_POST['password'] ?? '', $user['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['role'] = $user['role'];
            $_SESSION['user_login'] = $user['login'];
            header('Location: admin.php');
            exit;
        } else {
            sleep(1);
            $error = 'Неверный логин или пароль';
        }
    }
}

$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
$isOperator = isset($_SESSION['role']) && $_SESSION['role'] === 'operator';
$isLoggedIn = isset($_SESSION['role']);

// ===== ОБРАБОТКА ДЕЙСТВИЙ =====
if ($isLoggedIn && $_SERVER['REQUEST_METHOD'] === 'POST' && csrf_ok()) {
    
    // --- Действия АДМИНА ---
    if ($isAdmin) {
        if (($_POST['action'] ?? '') === 'delete_request') {
            $stmt = db()->prepare('DELETE FROM requests WHERE id = :id');
            $stmt->execute([':id' => (int)($_POST['id'] ?? 0)]);
            header('Location: admin.php?tab=requests'); exit;
        }
        if (($_POST['action'] ?? '') === 'add_user') {
            $new_login = trim($_POST['new_login'] ?? '');
            $new_password = $_POST['new_password'] ?? '';
            $new_role = $_POST['new_role'] ?? 'operator';
            if (mb_strlen($new_login) < 3 || mb_strlen($new_password) < 5) {
                $error = 'Логин от 3 символов, пароль от 5.';
            } else {
                try {
                    $hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $stmt = db()->prepare('INSERT INTO users (login, password_hash, role) VALUES (:l, :p, :r)');
                    $stmt->execute([':l' => $new_login, ':p' => $hash, ':r' => $new_role]);
                    $msg = 'Пользователь добавлен!';
                } catch (PDOException $ex) { $error = 'Такой логин уже есть.'; }
            }
        }
        if (($_POST['action'] ?? '') === 'delete_user') {
            $id = (int)($_POST['user_id'] ?? 0);
            $stmt = db()->prepare('SELECT login FROM users WHERE id = :id');
            $stmt->execute([':id' => $id]);
            $u = $stmt->fetch();
            if ($u && $u['login'] !== $_SESSION['user_login']) {
                db()->prepare('DELETE FROM users WHERE id = :id')->execute([':id' => $id]);
                $msg = 'Пользователь удалён.';
            } else { $error = 'Нельзя удалить самого себя!'; }
        }
    }

    // --- Действия ОПЕРАТОРА (Новости) ---
    if ($isOperator) {
        if (($_POST['action'] ?? '') === 'add_news') {
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            if (mb_strlen($title) < 3 || mb_strlen($content) < 5) {
                $error = 'Заголовок от 3 символов, текст от 5.';
            } else {
                $stmt = db()->prepare('INSERT INTO news (title, content) VALUES (:t, :c)');
                $stmt->execute([':t' => $title, ':c' => $content]);
                $msg = 'Новость опубликована!';
            }
        }
        if (($_POST['action'] ?? '') === 'delete_news') {
            $id = (int)($_POST['news_id'] ?? 0);
            db()->prepare('DELETE FROM news WHERE id = :id')->execute([':id' => $id]);
            $msg = 'Новость удалена.';
        }
    }
}

// ===== ЗАГРУЗКА ДАННЫХ ДЛЯ ОТОБРАЖЕНИЯ =====
$tab = $_GET['tab'] ?? 'requests';
$rows = []; $usersList = []; $newsList = []; $dbError = '';

if ($isLoggedIn) {
    try {
        if ($tab === 'users' && $isAdmin) {
            $usersList = db()->query('SELECT * FROM users ORDER BY id DESC')->fetchAll();
        } elseif ($tab === 'news' && $isOperator) {
            $newsList = db()->query('SELECT * FROM news ORDER BY id DESC')->fetchAll();
        } else {
            $tab = 'requests';
            $rows = db()->query('SELECT * FROM requests ORDER BY id DESC')->fetchAll();
        }
    } catch (PDOException $ex) { $dbError = 'Ошибка базы данных.'; }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка | Управление</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #FDF8F5; color: #2D2A26; margin: 0; padding: 30px 16px; }
        .box { max-width: 1100px; margin: 0 auto; background: #fff; border: 1px solid #E8E0DA; border-radius: 16px; padding: 28px; }
        h1 { margin-top: 0; font-size: 1.6rem; }
        input, select, textarea { width: 100%; padding: 12px; margin: 6px 0 16px; border: 1px solid #E8E0DA; border-radius: 10px; font-size: 1rem; font-family: inherit; }
        textarea { resize: vertical; min-height: 100px; }
        button, .btn { background: #D9467A; color: #fff; border: 0; border-radius: 10px; padding: 10px 20px; font-size: 0.95rem; cursor: pointer; text-decoration: none; display: inline-block; transition: 0.2s; }
        button:hover, .btn:hover { opacity: 0.8; }
        button.del { background: #D93025; padding: 6px 12px; }
        .login { max-width: 420px; }
        .error { color: #D93025; background: #FCE8E6; padding: 10px; border-radius: 8px; margin-bottom: 14px; }
        .success { color: #1E6B30; background: #E6F4EA; padding: 10px; border-radius: 8px; margin-bottom: 14px; }
        .top { display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; margin-bottom: 20px; }
        .tabs { display: flex; gap: 10px; margin-bottom: 20px; border-bottom: 2px solid #E8E0DA; padding-bottom: 10px; }
        .tabs a { text-decoration: none; color: #6B6560; font-weight: bold; padding: 10px 20px; border-radius: 10px; }
        .tabs a.active { background: #D9467A; color: #fff; }
        .scroll { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 18px; font-size: 0.9rem; }
        th, td { border-bottom: 1px solid #E8E0DA; padding: 10px 8px; text-align: left; vertical-align: top; }
        th { background: #FDF8F5; }
        .muted { color: #6B6560; }
        .role-tabs { display: flex; gap: 10px; margin-bottom: 20px; }
        .role-tabs button { flex: 1; }
        .role-tabs button.active { background: #D9467A; color: #fff; border: 2px solid #D9467A; }
        .role-tabs button.inactive { background: transparent; color: #D9467A; border: 2px solid #D9467A; }
        .add-form { background: #FDF8F5; padding: 20px; border-radius: 12px; border: 1px solid #E8E0DA; margin-bottom: 20px; }
        .add-form-grid { display: grid; grid-template-columns: 1fr 1fr 1fr auto; gap: 10px; align-items: end; }
        .add-form-grid input, .add-form-grid select { margin: 0; }
    </style>
</head>
<body>
<div class="box <?= $isLoggedIn ? '' : 'login' ?>">
<?php if (!$isLoggedIn): ?> 
    <h1>Вход в админку</h1>
    <div class="role-tabs">
        <button type="button" id="btn-admin" class="active" onclick="selectRole('admin')">Я Администратор</button>
        <button type="button" id="btn-operator" class="inactive" onclick="selectRole('operator')">Я Оператор</button>
    </div>
    <?php if ($error): ?><div class="error"><?= e($error) ?></div><?php endif; ?>
    <form method="post" autocomplete="off">
        <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
        <input type="hidden" name="action" value="login">
        <label>Логин<input type="text" id="login-input" name="login" maxlength="50" required placeholder="Выберите роль выше"></label>
        <label>Пароль<input type="password" name="password" maxlength="100" required></label>
        <button type="submit" style="width: 100%;">Войти в систему</button>
    </form>
    <script>
        function selectRole(role) {
            const loginInput = document.getElementById('login-input');
            const btnAdmin = document.getElementById('btn-admin');
            const btnOperator = document.getElementById('btn-operator');
            if (role === 'admin') {
                loginInput.value = 'admin'; btnAdmin.className = 'active'; btnOperator.className = 'inactive';
            } else {
                loginInput.value = 'operator'; btnOperator.className = 'active'; btnAdmin.className = 'inactive';
            }
        }
        selectRole('admin');
    </script>
<?php else: ?>
    <div class="top">
        <h1>Панель управления</h1>
        <div>
            <span class="muted" style="margin-right: 15px; font-size: 0.9rem;">
                Вы: <strong><?= e($_SESSION['user_login']) ?></strong> 
                (<?= $isAdmin ? 'Администратор' : 'Оператор' ?>)
            </span>
            <a class="btn" href="index.html">На сайт</a>
            <a class="btn" href="admin.php?logout=1" style="background: #6B6560;">Выйти</a>
        </div>
    </div>

    <div class="tabs">
        <a href="?tab=requests" class="<?= $tab === 'requests' ? 'active' : '' ?>">Заявки</a>
        <?php if ($isAdmin): ?>
            <a href="?tab=users" class="<?= $tab === 'users' ? 'active' : '' ?>">Пользователи</a>
        <?php endif; ?>
        <?php if ($isOperator): ?>
            <a href="?tab=news" class="<?= $tab === 'news' ? 'active' : '' ?>">Новости</a>
        <?php endif; ?>
    </div>

    <?php if ($error): ?><div class="error"><?= e($error) ?></div><?php endif; ?>
    <?php if ($msg): ?><div class="success"><?= e($msg) ?></div><?php endif; ?>

    <!-- ================= ЗАЯВКИ ================= -->
    <?php if ($tab === 'requests'): ?>
        <?php if ($dbError): ?><div class="error"><?= e($dbError) ?></div><?php endif; ?>
        <?php if (!$rows && !$dbError): ?><p class="muted">Заявок пока нет.</p><?php endif; ?>
        <?php if ($rows): ?>
        <div class="scroll">
        <table>
            <tr><th>№</th><th>Дата</th><th>Имя</th><th>Телефон</th><th>Событие</th><th>Изделия</th><th>Пожелания</th><th>Согласие</th><th></th></tr>
            <?php foreach ($rows as $r): ?>
            <tr>
                <td><?= (int)$r['id'] ?></td>
                <td><?= e(date('d.m.Y H:i', strtotime($r['created_at']))) ?></td>
                <td><?= e($r['name']) ?></td>
                <td><?= e($r['phone']) ?></td>
                <td><?= e($r['event_type']) ?></td>
                <td><?= e($r['products']) ?></td>
                <td><?= e((string)$r['wishes']) ?></td>
                <td><?= $r['consent'] ? 'Да' : 'Нет' ?></td>
                <td>
                    <?php if ($isAdmin): ?>
                        <form method="post" onsubmit="return confirm('Удалить заявку?');">
                            <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
                            <input type="hidden" name="action" value="delete_request">
                            <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
                            <button type="submit" class="del">Удалить</button>
                        </form>
                    <?php else: ?>
                        <span class="muted" style="font-size: 0.8rem;">Только чтение</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <?php endif; ?>

    <!-- ================= ПОЛЬЗОВАТЕЛИ ================= -->
    <?php elseif ($tab === 'users' && $isAdmin): ?>
        <div class="add-form">
            <form method="post" class="add-form-grid">
                <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
                <input type="hidden" name="action" value="add_user">
                <div>
                    <label style="font-size: 0.8rem; font-weight: bold;">Логин</label>
                    <input type="text" name="new_login" required placeholder="Например: manager2">
                </div>
                <div>
                    <label style="font-size: 0.8rem; font-weight: bold;">Пароль</label>
                    <input type="text" name="new_password" required placeholder="Минимум 5 символов">
                </div>
                <div>
                    <label style="font-size: 0.8rem; font-weight: bold;">Роль</label>
                    <select name="new_role">
                        <option value="operator">Оператор</option>
                        <option value="admin">Администратор</option>
                    </select>
                </div>
                <button type="submit">Добавить</button>
            </form>
        </div>
        <div class="scroll">
        <table>
            <tr><th>ID</th><th>Логин</th><th>Роль</th><th>Дата создания</th><th></th></tr>
            <?php foreach ($usersList as $u): ?>
            <tr>
                <td><?= (int)$u['id'] ?></td>
                <td><strong><?= e($u['login']) ?></strong></td>
                <td><?= $u['role'] === 'admin' ? '<span style="color:#D9467A;font-weight:bold;">Администратор</span>' : 'Оператор' ?></td>
                <td><?= e(date('d.m.Y H:i', strtotime($u['created_at']))) ?></td>
                <td>
                    <?php if ($u['login'] !== $_SESSION['user_login']): ?>
                        <form method="post" onsubmit="return confirm('Удалить пользователя <?= e($u['login']) ?>?');">
                            <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
                            <input type="hidden" name="action" value="delete_user">
                            <input type="hidden" name="user_id" value="<?= (int)$u['id'] ?>">
                            <button type="submit" class="del">Удалить</button>
                        </form>
                    <?php else: ?>
                        <span class="muted">(Это вы)</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>

    <!-- ================= НОВОСТИ (Для оператора) ================= -->
    <?php elseif ($tab === 'news' && $isOperator): ?>
        <div class="add-form">
            <h3 style="margin-top:0;">Добавить новость</h3>
            <form method="post">
                <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
                <input type="hidden" name="action" value="add_news">
                <label style="font-size: 0.8rem; font-weight: bold;">Заголовок</label>
                <input type="text" name="title" required placeholder="Например: Новые вкусы эклеров">
                <label style="font-size: 0.8rem; font-weight: bold;">Текст новости</label>
                <textarea name="content" required placeholder="Текст новости..."></textarea>
                <button type="submit">Опубликовать</button>
            </form>
        </div>
        
        <div class="scroll">
        <table>
            <tr><th>ID</th><th>Дата</th><th>Заголовок</th><th>Текст</th><th></th></tr>
            <?php foreach ($newsList as $n): ?>
            <tr>
                <td><?= (int)$n['id'] ?></td>
                <td><?= e(date('d.m.Y H:i', strtotime($n['created_at']))) ?></td>
                <td><strong><?= e($n['title']) ?></strong></td>
                <td><?= nl2br(e($n['content'])) ?></td>
                <td>
                    <form method="post" onsubmit="return confirm('Удалить новость?');">
                        <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
                        <input type="hidden" name="action" value="delete_news">
                        <input type="hidden" name="news_id" value="<?= (int)$n['id'] ?>">
                        <button type="submit" class="del">Удалить</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
    <?php endif; ?>
<?php endif; ?>
</div>
</body>
</html>