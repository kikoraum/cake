<?php
require __DIR__ . '/config.php';
// Достаем ВСЕ новости из базы
$news = [];
try {
    $news = db()->query('SELECT * FROM news ORDER BY id DESC')->fetchAll();
} catch (PDOException $ex) {
    $error = 'Не удалось загрузить новости.';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наши новости | Love&Sweets</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Используем те же стили, что и на главной */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --primary: #D9467A; --primary-dark: #B83A64; --dark: #2D2A26;
            --light: #FDF8F5; --gray: #6B6560; --border: #E8E0DA;
            --font: 'Montserrat', sans-serif; --container: 1200px;
        }
        html { scroll-behavior: smooth; }
        body { font-family: var(--font); color: var(--dark); background-color: var(--light); line-height: 1.5; }
        img { display: block; max-width: 100%; height: auto; }
        a { color: inherit; text-decoration: none; }
        button { cursor: pointer; border: none; background: none; }
        ul, ol { list-style: none; }
        .container { width: 100%; max-width: var(--container); margin: 0 auto; padding: 0 20px; }
        .section { padding: 80px 0; }

        /* Типографика */
        .h1 { font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 700; line-height: 1.15; }
        .h2 { font-size: clamp(1.75rem, 3.5vw, 2.5rem); font-weight: 700; margin-bottom: 20px; }
        .h3 { font-size: 1.25rem; font-weight: 600; margin-bottom: 8px; }
        .lead { font-size: 1.125rem; color: var(--gray); max-width: 700px; }

        /* Шапка */
        .header { position: fixed; top: 0; left: 0; right: 0; z-index: 100; background: rgba(253, 248, 245, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid var(--border); padding: 12px 0; }
        .header__inner { display: flex; align-items: center; justify-content: space-between; gap: 20px; }
        .logo { font-size: 1.5rem; font-weight: 700; white-space: nowrap; }
        .logo span { color: var(--primary); }
        .nav { display: flex; align-items: center; gap: 24px; }
        .nav__link { font-weight: 500; color: var(--gray); transition: color 0.2s; }
        .nav__link:hover, .nav__link.active { color: var(--primary); }
        .header__phone { font-weight: 600; }
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: 14px 32px; border-radius: 50px; font-weight: 600; background-color: var(--primary); color: #fff; }
        .btn:hover { background-color: var(--primary-dark); }

        /* Сетка новостей */
        .news-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px; }
        .news-card { background: #fff; border-radius: 20px; border: 1px solid var(--border); padding: 32px; display: flex; flex-direction: column; transition: transform 0.2s; }
        .news-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.05); }
        .news-card__date { font-size: 0.8rem; color: #999; margin-bottom: 10px; }
        .news-card__title { font-size: 1.25rem; font-weight: 600; color: var(--primary); margin-bottom: 12px; }
        .news-card__text { color: var(--gray); font-size: 0.95rem; flex-grow: 1; }

        /* Футер */
        .footer { background: var(--dark); color: rgba(255,255,255,0.6); text-align: center; padding: 30px 0; font-size: 0.9rem; margin-top: 80px; }

        /* Адаптив */
        @media (max-width: 768px) {
            .nav { display: none; }
            .header__phone { display: none; }
        }
    </style>
</head>
<body>
    <!-- Шапка сайта -->
    <header class="header">
        <div class="container header__inner">
            <a href="index.php" class="logo">Love&<span>Sweets</span></a>
            <nav class="nav">
                <a href="index.php" class="nav__link">Главная</a>
                <a href="blog.php" class="nav__link active">Блог</a>
                <a href="index.php#callback" class="nav__link">Контакты</a>
            </nav>
            <a href="index.php#callback" class="btn">Оставить заявку</a>
        </div>
    </header>

    <!-- Секция блога -->
    <section class="section" style="padding-top: 120px;">
        <div class="container">
            <h1 class="h1">Наши новости и статьи</h1>
            <p class="lead" style="margin-top: 15px;">Свежие события из жизни нашей кондитерской, новые вкусы и интересные предложения.</p>
            
            <?php if (isset($error)): ?>
                <p style="color: #D93025; margin-top: 20px;"><?= e($error) ?></p>
            <?php endif; ?>

            <div class="news-grid">
                <?php if (empty($news)): ?>
                    <p>Пока новостей нет. Заходите позже!</p>
                <?php else: ?>
                    <?php foreach ($news as $n): ?>
                        <div class="news-card">
                            <div class="news-card__date"><?= date('d.m.Y', strtotime($n['created_at'])) ?></div>
                            <h3 class="news-card__title"><?= e($n['title']) ?></h3>
                            <p class="news-card__text"><?= nl2br(e($n['content'])) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Футер -->
    <footer class="footer">
        <div class="container">
            &copy; 2023 Любовь и сладости. Все права защищены.
        </div>
    </footer>
</body>
</html>