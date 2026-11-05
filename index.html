<?php
// Подключаем базу данных и достаем 3 последние новости для главной страницы
require __DIR__ . '/config.php';
$news = [];
try {
    $news = db()->query('SELECT * FROM news ORDER BY id DESC LIMIT 3')->fetchAll();
} catch (PDOException $ex) {
    // Если таблицы нет или ошибка - просто не выводим новости
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src 'self' https://loveandsweets.ru data:; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src https://fonts.gstatic.com; script-src 'self' 'unsafe-inline'; form-action 'self'; base-uri 'self'; object-src 'none'">

    <title>Десерт с логотипом заказать в Москве недорого с доставкой | Цены на брендированные десерты</title>
    <meta name="description" content="Десерты с логотипом — купить в семейной кондитерской ✅ Натуральная продукция ✅ Большой выбор авторских рецептов +7 499 322 00 20">
    <link rel="canonical" href="https://loveandsweets.ru/corporative/">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* ===== СБРОС СТИЛЕЙ ===== */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* ===== ГЛОБАЛЬНЫЕ ПЕРЕМЕННЫЕ ===== */
        :root {
            --primary: #D9467A;
            --primary-dark: #B83A64;
            --dark: #2D2A26;
            --light: #FDF8F5;
            --gray: #6B6560;
            --border: #E8E0DA;
            --font: 'Montserrat', sans-serif;
            --container: 1200px;
        }

        /* ===== ОБЩИЕ СТИЛИ ===== */
        html { scroll-behavior: smooth; }
        body {
            font-family: var(--font);
            color: var(--dark);
            background-color: var(--light);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }
        img { display: block; max-width: 100%; height: auto; }
        a { color: inherit; text-decoration: none; }
        button, input, textarea, select { font: inherit; color: inherit; }
        button { cursor: pointer; border: none; background: none; }
        ul, ol { list-style: none; }

        .container { width: 100%; max-width: var(--container); margin: 0 auto; padding: 0 20px; }
        .section { padding: 80px 0; }

        /* ===== ТИПОГРАФИЯ ===== */
        .h1 { font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 700; line-height: 1.15; letter-spacing: -0.02em; }
        .h2 { font-size: clamp(1.75rem, 3.5vw, 2.5rem); font-weight: 700; line-height: 1.2; margin-bottom: 20px; }
        .h3 { font-size: 1.25rem; font-weight: 600; margin-bottom: 8px; }
        .lead { font-size: 1.125rem; color: var(--gray); max-width: 700px; line-height: 1.6; }

        /* ===== КНОПКИ ===== */
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: 14px 32px; border-radius: 50px; font-weight: 600; font-size: 1rem; transition: all 0.2s ease; text-align: center; white-space: nowrap; }
        .btn--primary { background-color: var(--primary); color: #fff; }
        .btn--primary:hover { background-color: var(--primary-dark); transform: translateY(-2px); box-shadow: 0 8px 20px rgba(217, 70, 122, 0.3); }
        .btn--outline { border: 2px solid var(--primary); color: var(--primary); background: transparent; }
        .btn--outline:hover { background: var(--primary); color: #fff; }
        .btn--large { padding: 18px 40px; font-size: 1.125rem; }
        .btn--full { width: 100%; }

        /* ===== ШАПКА ===== */
        .header { position: fixed; top: 0; left: 0; right: 0; z-index: 100; background: rgba(253, 248, 245, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid var(--border); padding: 12px 0; }
        .header__inner { display: flex; align-items: center; justify-content: space-between; gap: 20px; }
        .logo { font-size: 1.5rem; font-weight: 700; color: var(--dark); letter-spacing: -0.02em; white-space: nowrap; }
        .logo span { color: var(--primary); }
        .nav { display: flex; align-items: center; gap: 24px; }
        .nav__link { font-weight: 500; color: var(--gray); transition: color 0.2s; white-space: nowrap; }
        .nav__link:hover { color: var(--primary); }
        .header__cta { display: flex; align-items: center; gap: 16px; }
        .header__contacts { display: flex; flex-direction: column; font-size: 0.75rem; color: var(--gray); line-height: 1.2; }
        .header__phone { font-weight: 600; color: var(--dark); font-size: 1rem; white-space: nowrap; }
        .burger { display: none; flex-direction: column; gap: 5px; width: 24px; height: 24px; justify-content: center; }
        .burger span { display: block; height: 2px; background: var(--dark); border-radius: 2px; transition: 0.3s; }

        /* ===== ГЛАВНЫЙ ЭКРАН ===== */
        .hero { position: relative; min-height: 85vh; display: flex; align-items: center; padding-top: 100px; background: var(--light); overflow: hidden; }
        .hero__bg { position: absolute; inset: 0; z-index: 0; }
        .hero__bg img { width: 100%; height: 100%; object-fit: cover; object-position: center right; filter: saturate(1.4) contrast(1.05) blur(0.3px); transform: scale(1.01); }
        .hero__bg::after { content: ''; position: absolute; inset: 0; background: linear-gradient(90deg, rgba(253, 248, 245, 1) 0%, rgba(253, 248, 245, 0.85) 35%, rgba(253, 248, 245, 0.1) 100%); }
        .hero__content { position: relative; z-index: 1; max-width: 700px; }
        .hero__badge { display: inline-block; padding: 6px 16px; background: rgba(217, 70, 122, 0.1); color: var(--primary); border-radius: 50px; font-size: 0.875rem; font-weight: 600; margin-bottom: 24px; }
        .hero__title { margin-bottom: 20px; }
        .hero__subtitle { font-size: 1.125rem; color: var(--gray); margin-bottom: 32px; max-width: 550px; }
        .hero__actions { display: flex; flex-wrap: wrap; gap: 16px; margin-bottom: 40px; }
        .hero__stats { display: flex; gap: 40px; flex-wrap: wrap; }
        .stat__value { font-size: 1.75rem; font-weight: 700; color: var(--primary); }
        .stat__label { font-size: 0.875rem; color: var(--gray); }

        /* ===== ПРОДУКТЫ ===== */
        .products__grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .product-card { background: #fff; border-radius: 20px; overflow: hidden; transition: transform 0.2s, box-shadow 0.2s; border: 1px solid var(--border); }
        .product-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.06); }
        .product-card__img { aspect-ratio: 4/3; overflow: hidden; }
        .product-card__img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s; }
        .product-card:hover .product-card__img img { transform: scale(1.03); }
        .product-card__body { padding: 24px; }
        .product-card__title { font-size: 1.25rem; font-weight: 600; margin-bottom: 8px; }
        .product-card__text { font-size: 0.95rem; color: var(--gray); line-height: 1.5; }

        /* ===== ПРЕИМУЩЕСТВА ===== */
        .features { background: #fff; }
        .features__grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px; margin-top: 40px; }
        .feature { padding: 32px 24px; background: var(--light); border-radius: 16px; border: 1px solid var(--border); transition: border-color 0.2s; }
        .feature:hover { border-color: var(--primary); }
        .feature__num { font-size: 0.875rem; font-weight: 700; color: var(--primary); margin-bottom: 12px; }
        .feature__title { font-size: 1.125rem; font-weight: 600; margin-bottom: 8px; }
        .feature__text { font-size: 0.95rem; color: var(--gray); }

        /* ===== КАЧЕСТВО ===== */
        .quality { background: var(--light); }
        .quality__inner { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
        .quality__img { border-radius: 24px; overflow: hidden; aspect-ratio: 4/3; }
        .quality__img img { width: 100%; height: 100%; object-fit: cover; }
        .quality__list { margin: 24px 0; display: grid; gap: 12px; }
        .quality__list li { display: flex; align-items: flex-start; gap: 12px; color: var(--gray); font-size: 0.95rem; }
        .quality__list li::before { content: "✓"; color: var(--primary); font-weight: 700; flex-shrink: 0; }

        /* ===== ОПИСАНИЕ ===== */
        .description-block { background: #fff; }
        .description-block p { margin-bottom: 16px; color: var(--gray); font-size: 1.05rem; }
        .description-block ul { margin-bottom: 16px; padding-left: 20px; }
        .description-block li { margin-bottom: 8px; color: var(--gray); position: relative; }
        .description-block li::before { content: "•"; color: var(--primary); font-weight: bold; display: inline-block; width: 1em; margin-left: -1em; }

        /* ===== ФОРМА ===== */
        .form-section { background: var(--light); }
        .form-section__inner { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start; }
        .form__group { margin-bottom: 20px; }
        .form__label { display: block; font-size: 0.875rem; font-weight: 600; margin-bottom: 8px; }
        .form__input, .form__textarea, .form__select { width: 100%; padding: 14px 16px; border: 1px solid var(--border); border-radius: 12px; background: #fff; transition: border-color 0.2s; font-size: 1rem; }
        .form__input:focus, .form__textarea:focus, .form__select:focus { outline: none; border-color: var(--primary); }
        .form__textarea { min-height: 100px; resize: vertical; }
        .form__checkbox { display: flex; align-items: flex-start; gap: 10px; font-size: 0.8rem; color: var(--gray); margin-bottom: 24px; }
        .form__checkbox input { margin-top: 3px; flex-shrink: 0; accent-color: var(--primary); }
        .form__contacts { margin-top: 24px; font-size: 0.9rem; color: var(--gray); }
        .form__contacts a { color: var(--primary); font-weight: 600; }

        /* ===== ОТЗЫВЫ ===== */
        .reviews { background: #fff; }
        .reviews__grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px; margin-top: 40px; }
        .review-card { background: var(--light); border-radius: 20px; padding: 32px; border: 1px solid var(--border); display: flex; flex-direction: column; gap: 16px; }
        .review-card__stars { color: #F5A623; font-size: 1.25rem; letter-spacing: 2px; }
        .review-card__text { font-size: 0.95rem; color: var(--gray); line-height: 1.6; flex-grow: 1; font-style: italic; }
        .review-card__author { display: flex; align-items: center; gap: 16px; margin-top: 8px; border-top: 1px solid var(--border); padding-top: 16px; }
        .review-card__avatar { width: 48px; height: 48px; background: rgba(217, 70, 122, 0.1); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1.1rem; }
        .review-card__name { font-weight: 600; font-size: 1rem; color: var(--dark); margin-bottom: 2px; }
        .review-card__company { font-size: 0.8rem; color: var(--gray); }

        /* ===== ПОДВАЛ ===== */
        .footer { background: var(--dark); color: #fff; padding: 60px 0 30px; }
        .footer__grid { display: grid; grid-template-columns: 2fr 1.5fr 1.5fr; gap: 40px; margin-bottom: 40px; }
        .footer__brand { font-size: 1.5rem; font-weight: 700; margin-bottom: 16px; }
        .footer__brand span { color: var(--primary); }
        .footer__text { color: rgba(255,255,255,0.6); font-size: 0.9rem; max-width: 300px; }
        .footer__title { font-weight: 600; margin-bottom: 16px; color: rgba(255,255,255,0.9); }
        .footer__links { display: grid; gap: 10px; }
        .footer__links a, .footer__links p { color: rgba(255,255,255,0.6); font-size: 0.9rem; transition: color 0.2s; }
        .footer__links a:hover { color: #fff; }
        .footer__disclaimer { font-size: 0.75rem; color: rgba(255,255,255,0.4); margin-top: 8px; }
        .footer__bottom { border-top: 1px solid rgba(255,255,255,0.1); padding-top: 24px; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 16px; font-size: 0.8rem; color: rgba(255,255,255,0.4); }
        .footer__bottom a { color: inherit; }
        .footer__bottom a:hover { color: #fff; }

        /* ===== ПРОВЕРКА ФОРМЫ ===== */
        .form__input.invalid, .form__textarea.invalid, .form__select.invalid { border-color: #D93025; }
        .form__error { display: none; color: #D93025; font-size: 0.8rem; margin-top: 6px; }
        .form__error.show { display: block; }
        .form__checkbox a { color: var(--primary); text-decoration: underline; }
        .form__hint { font-size: 0.8rem; color: var(--gray); margin-top: 8px; text-align: center; }
        .btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none; box-shadow: none; }
        .form__success { display: none; margin-top: 20px; padding: 16px 20px; background: rgba(46, 160, 67, 0.1); border: 1px solid rgba(46, 160, 67, 0.4); border-radius: 12px; color: #1E6B30; font-weight: 500; }
        .form__success.show { display: block; }
        .hp { position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; }

        /* ===== АДАПТИВНОСТЬ ===== */
        @media (max-width: 992px) {
            .quality__inner, .form-section__inner { grid-template-columns: 1fr; gap: 40px; }
            .quality__img { order: -1; }
            .footer__grid { grid-template-columns: 1fr 1fr; }
            .nav, .header__contacts { display: none; }
            .burger { display: flex; }
        }
        @media (max-width: 768px) {
            .hero { min-height: auto; padding: 120px 0 80px; }
            .hero__bg::after { background: linear-gradient(180deg, rgba(253, 248, 245, 0.95) 0%, rgba(253, 248, 245, 0.8) 100%); }
            .hero__stats { gap: 24px; }
            .stat__value { font-size: 1.5rem; }
            .section { padding: 60px 0; }
            .footer__grid { grid-template-columns: 1fr; gap: 32px; }
            .footer__bottom { flex-direction: column; text-align: center; }
        }
        @media (max-width: 480px) {
            .hero__actions .btn { width: 100%; }
            .container { padding: 0 16px; }
            .product-card__body { padding: 20px; }
        }
    </style>
</head>

<body>
    <!-- ================= ШАПКА САЙТА ================= -->
    <header class="header">
        <div class="container header__inner">
            <a href="index.php" class="logo">Love&<span>Sweets</span></a>
            <nav class="nav">
                <a href="index.php" class="nav__link">Главная</a>
                <a href="blog.php" class="nav__link">Блог</a>
                <a href="#callback" class="nav__link">Контакты</a>
            </nav>
            <div class="header__cta">
                <div class="header__contacts">
                    <a href="tel:+74993220020" class="header__phone">+7 499 322-00-20</a>
                    <span>пн-пт 10:00–20:00, сб-вс 10:00-17:00</span>
                </div>
                <a href="#callback" class="btn btn--primary">Оставить заявку</a>
                <button class="burger" aria-label="Открыть меню"><span></span><span></span><span></span></button>
            </div>
        </div>
    </header>

    <!-- ================= ГЛАВНЫЙ ЭКРАН ================= -->
    <section class="hero">
        <div class="hero__bg">
            <img src="fb2f54db2d9fb43ff31ba5e5bbc5daef.jpg" alt="Белые торты с золотым декором">
        </div>
        <div class="container hero__content">
            <div class="hero__badge">Для корпоративных клиентов</div>
            <h1 class="h1 hero__title">Особые сладости для важных мероприятий</h1>
            <p class="hero__subtitle">Брендированные десерты с вашим логотипом. Специальные условия для ресторанов, кейтеринговых, PR, event и свадебных агентств.</p>
            <div class="hero__actions">
                <a href="#callback" class="btn btn--primary btn--large">Связаться с менеджером</a>
                <a href="#products" class="btn btn--outline btn--large">Узнать подробнее</a>
            </div>
            <div class="hero__stats">
                <div class="stat"><div class="stat__value">1000+</div><div class="stat__label">сладостей в сутки</div></div>
                <div class="stat"><div class="stat__value">10 лет</div><div class="stat__label">на рынке</div></div>
                <div class="stat"><div class="stat__value">100%</div><div class="stat__label">натуральные ингредиенты</div></div>
            </div>
        </div>
    </section>

    <!-- ================= СЕКЦИЯ ПРОДУКТОВ ================= -->
    <section id="products" class="section">
        <div class="container">
            <h2 class="h2">Десерты с логотипом</h2>
            <p class="lead">Специальные условия на сладости для корпоративных клиентов: ресторанов, кейтеринговых, PR, event и свадебных агентств.</p>
            <div class="products__grid">
                <article class="product-card">
                    <div class="product-card__img"><img src="https://loveandsweets.ru/upload/iblock/dc4/m4ugd494jgio7pzro1ypu2w72gcr3k6n.jpg" alt="Прозрачные леденцы с логотипом" loading="lazy"></div>
                    <div class="product-card__body"><h3 class="product-card__title">Леденцы</h3><p class="product-card__text">Вы обратили внимание на наши удивительно прозрачные леденцы? Это не сахар – мы делаем их из изомальта - низкокалорийного растительного заменителя сахара, который получают из сахарной свеклы, тростника или меда. Внутри таких леденцов могут быть натуральные цветы и травы под тематику мероприятия или съедобная фотопечать с логотипом вашей компании, а также QR-кодом, который переведет на ваш сайт.</p></div>
                </article>
                <article class="product-card">
                    <div class="product-card__img"><img src="https://loveandsweets.ru/upload/iblock/780/2zkebf44k5w26uk9k0n86uqm5bb5btx6.webp" alt="Оригинальный торт с логотипом" loading="lazy"></div>
                    <div class="product-card__body"><h3 class="product-card__title">Оригинальные торты</h3><p class="product-card__text">Мы любим нестандартные задачи, а в штате кондитерской работает графический дизайнер, готовый воплотить на дизайн-макете любую вашу задумку. Уникальный торт, который мы создадим специально для вас, впечатлит гостей мероприятия - в этом нам равных нет!</p></div>
                </article>
                <article class="product-card">
                    <div class="product-card__img"><img src="https://loveandsweets.ru/upload/iblock/ffc/4b2hvyyzs0yj51b7uu2kwqxvwvp53dc6.jpg" alt="Пирожные и эклеры с логотипом" loading="lazy"></div>
                    <div class="product-card__body"><h3 class="product-card__title">Пирожные и эклеры с логотипом</h3><p class="product-card__text">Заварные эклеры и множество вкусов самых разных пирожных, а еще гибкость оформления делают эти угощения одними из самых популярных для корпоративных праздников и подарков.</p></div>
                </article>
            </div>
        </div>
    </section>

    <!-- ================= НОВОСТИ (Динамический блок) ================= -->
    <?php if ($news): ?>
    <section class="section" style="background: var(--light);">
        <div class="container">
            <h2 class="h2">Наши новости</h2>
            <div class="products__grid" style="margin-top: 30px;">
                <?php foreach ($news as $n): ?>
                    <div class="product-card" style="padding: 24px; background: #fff;">
                        <h3 class="product-card__title" style="color: var(--primary);"><?= e($n['title']) ?></h3>
                        <p class="product-card__text" style="margin-top: 10px;"><?= nl2br(e($n['content'])) ?></p>
                        <small style="color: #999; margin-top: 15px; display: block; font-size: 0.8rem;">
                            <?= date('d.m.Y', strtotime($n['created_at'])) ?>
                        </small>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ================= СЕКЦИЯ ПРЕИМУЩЕСТВ ================= -->
    <section class="section features">
        <div class="container">
            <h2 class="h2">У нас чёрный пояс по кондитерскому искусству</h2>
            <p class="lead">Можете смело вычёркивать пункт из своего чек-листа, связанного с организацией сладкой части для корпоративного мероприятия — мы проконсультируем, приготовим и доставим ваши корпоративные сладости в назначенный день, время и место.</p>
            <div class="features__grid">
                <div class="feature"><div class="feature__num">01</div><h3 class="feature__title">Фото-печать</h3><p class="feature__text">Логотипы, фотографии высокого качества, любые изображения в цифровом формате мы можем перенести на сахарную пасту или шоколад, которые украсят сладости.</p></div>
                <div class="feature"><div class="feature__num">02</div><h3 class="feature__title">3D-фигурки</h3><p class="feature__text">На собственном 3D-принтере мы создаем любые пресс-формы для шоколада или сахарной пасты.</p></div>
                <div class="feature"><div class="feature__num">03</div><h3 class="feature__title">Любая начинка</h3><p class="feature__text">Имеем возможность предложить вам начинки на любой вкус.</p></div>
                <div class="feature"><div class="feature__num">04</div><h3 class="feature__title">1 000 сладостей/сутки</h3><p class="feature__text">Многолетний опыт и профессиональная команда позволяют нам качественно выполнять заказы любого объема.</p></div>
            </div>
        </div>
    </section>

    <!-- ================= СЕКЦИЯ КАЧЕСТВА ================= -->
    <section class="section quality">
        <div class="container quality__inner">
            <div class="quality__img"><img src="https://loveandsweets.ru/upload/iblock/3e5/mbsgk10pytck4gg0c43i53w31qg296vk.JPG" alt="Натуральные ингредиенты для десертов" loading="lazy"></div>
            <div class="quality__content">
                <h2 class="h2">Вкус из детства</h2>
                <p class="lead">Мы не используем в приготовлении маргарин, пальмовое масло, консерванты, пищевые добавки и эмульгаторы.</p>
                <ul class="quality__list">
                    <li>Только натуральные продукты: цельное молоко, йогурт, сливочное масло, жирные сливки.</li>
                    <li>На местных рынках покупаем орехи, сезонные фрукты и ягоды — они вкуснее, чем магазинные.</li>
                    <li>Всегда используем муку высшего сорта, домашнюю тягучую карамель, настоящий шоколад и какао-масло.</li>
                </ul>
                <a href="#callback" class="btn btn--primary">Оставить заявку</a>
            </div>
        </div>
    </section>

    <!-- ================= СЕКЦИЯ ОПИСАНИЯ ================= -->
    <section class="section description-block">
        <div class="container">
            <h2 class="h2">Наши кондитерские изделия — это:</h2>
            <p>Магия кондитерского искусства рождается из любви к своему сложному и интересному делу. Надежным фундаментом успешной семейной компании служат честность и ответственность перед клиентами.</p>
            <p>Для приготовления брендированных десертов и тортов мы используем только свежие и качественные ингредиенты — такие, какие обычно покупаем себе домой: свежие орехи, сочные ягоды, ароматные фрукты, жирные сливки, нежное сливочное масло, рассыпчатую воздушную муку, душистый янтарный мед и многое другое. Все, что вы видите в каталоге, создано из натуральных ингредиентов. На эмульгаторы, ароматизаторы, пальмовое масло и консерванты наложен строгий запрет.</p>
            <ul>
                <li>качество, подтвержденное технологом и независимыми экспертами;</li>
                <li>верность традициям и непрерывное развитие рецептур;</li>
                <li>широкая галерея начинок;</li>
                <li>оригинальный дизайн с применением современных технологий.</li>
            </ul>
            <p>Каждый индивидуальный заказ для кондитера — это прекрасная возможность проявить себя и пофантазировать. «За кадром» остается сложнейшая работа! Только мы знаем, как создается тот или иной декор, как он фиксируется на торте, какой вес имеют коржи и что помогает держать форму нескольким ярусам. Рецептуры тщательно просчитываются технологом, чтобы достичь идеального гармоничного вкуса.</p>
            <p>Все заботы по доставке мы также берем на себя! Курьер собственной службы доставки привезет торт в назначенный день и время.</p>
        </div>
    </section>

    <!-- ================= СЕКЦИЯ С ФОРМОЙ ================= -->
    <section id="callback" class="section form-section">
        <div class="container">
            <div class="form-section__inner">
                <div>
                    <h2 class="h2">Наполните событие сладкими моментами</h2>
                    <p class="lead" style="margin-bottom: 32px;">Оставьте заявку — менеджер свяжется с вами, поможет с выбором и рассчитает стоимость.</p>
                    <form id="feedback-form" novalidate>
                        <div class="form__group">
                            <label for="event-type" class="form__label">Для какого события</label>
                            <select id="event-type" name="event_type" class="form__select" required>
                                <option value="" disabled selected>Выберите тип события</option>
                                <option value="День Рождения">День Рождения</option>
                                <option value="Юбилей">Юбилей</option>
                                <option value="Свадьба">Свадьба</option>
                                <option value="Корпоративное мероприятие">Корпоративное мероприятие</option>
                                <option value="Другое">Другое</option>
                            </select>
                            <div class="form__error" id="err-event">Выберите тип события.</div>
                        </div>
                        <div class="form__group">
                            <label for="products-desc" class="form__label">Укажите тип и количество изделий</label>
                            <input type="text" id="products-desc" name="products_desc" class="form__input" placeholder="Например: 50 эклеров с логотипом" maxlength="200" autocomplete="off" required>
                            <div class="form__error" id="err-products">Укажите, что и в каком количестве вы хотите заказать.</div>
                        </div>
                        <div class="form__group">
                            <label for="wishes" class="form__label">Опишите вашу задумку или пожелания</label>
                            <textarea id="wishes" name="wishes" class="form__textarea" placeholder="Расскажите, что хотите получить..." maxlength="1000" autocomplete="off"></textarea>
                            <div class="form__error" id="err-wishes">Слишком длинный текст (максимум 1000 символов).</div>
                        </div>
                        <div class="form__group">
                            <label for="name" class="form__label">Как вас зовут</label>
                            <input type="text" id="name" name="name" class="form__input" placeholder="Иван Иванов" maxlength="60" autocomplete="name" required>
                            <div class="form__error" id="err-name">Введите имя буквами (от 2 до 60 символов, без цифр и спецсимволов).</div>
                        </div>
                        <div class="form__group">
                            <label for="phone" class="form__label">Как с вами связаться</label>
                            <input type="tel" id="phone" name="phone" class="form__input" placeholder="+7 (___) ___-__-__" maxlength="18" autocomplete="tel" inputmode="tel" required>
                            <div class="form__error" id="err-phone">Введите телефон полностью: +7 (900) 123-45-67.</div>
                        </div>
                        <div class="hp" aria-hidden="true">
                            <label for="website">Не заполняйте это поле</label>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                        </div>
                        <div class="form__checkbox">
                            <input type="checkbox" id="consent" name="consent" required>
                            <label for="consent">Я даю <a href="consent.html" target="_blank" rel="noopener noreferrer">согласие на обработку персональных данных</a> и принимаю условия <a href="privacy.html" target="_blank" rel="noopener noreferrer">политики конфиденциальности</a></label>
                        </div>
                        <div class="form__error" id="err-consent" style="margin-top:-16px; margin-bottom:20px;">Для отправки заявки необходимо согласие на обработку персональных данных.</div>
                        <button type="submit" class="btn btn--primary btn--large btn--full" id="submit-btn" disabled>Отправить заявку</button>
                        <div class="form__hint" id="submit-hint">Кнопка станет активной после согласия на обработку персональных данных</div>
                        <div class="form__success" id="form-success" role="status"></div>
                        <div class="form__contacts">
                            Либо свяжитесь с нами удобным способом: <br>
                            <a href="tel:+74993220020">+7 499 322-00-20</a> / <a href="https://api.whatsapp.com/send?phone=79686227342" target="_blank" rel="noopener noreferrer">Whats’App</a> / <a href="https://t.me/loveandsweets" target="_blank" rel="noopener noreferrer">Telegram</a>
                        </div>
                    </form>
                </div>
                <div>
                    <img src="https://loveandsweets.ru/upload/iblock/663/fcly39azql4z6ryeq8kdy55advo7toif.jpg" alt="Десерты для мероприятий" style="border-radius: 24px; width: 100%; aspect-ratio: 3/4; object-fit: cover;" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- ================= СЕКЦИЯ ОТЗЫВОВ ================= -->
    <section class="section reviews">
        <div class="container">
            <h2 class="h2">Нам доверяют важные события</h2>
            <p class="lead">Отзывы наших постоянных партнеров — ресторанов, ивент-агентств и крупных компаний.</p>
            <div class="reviews__grid">
                <div class="review-card">
                    <div class="review-card__stars">★★★★★</div>
                    <p class="review-card__text">«Заказывали брендированные эклеры с логотипом для годовой конференции. Все гости были в восторге! Очень удобно, что можно было нанести логотип прямо на глазурь.»</p>
                    <div class="review-card__author"><div class="review-card__avatar">ЕС</div><div><div class="review-card__name">Екатерина Смирнова</div><div class="review-card__company">Event-агентство «Праздник»</div></div></div>
                </div>
                <div class="review-card">
                    <div class="review-card__stars">★★★★★</div>
                    <p class="review-card__text">«Долго искали кондитеров, которые смогут сделать прозрачные леденцы с цветами внутри для презентации нашего нового парфюма. Love&Sweets справились на 100%!»</p>
                    <div class="review-card__author"><div class="review-card__avatar">АИ</div><div><div class="review-card__name">Алексей Иванов</div><div class="review-card__company">PR-директор, Beauty Brand</div></div></div>
                </div>
                <div class="review-card">
                    <div class="review-card__stars">★★★★★</div>
                    <p class="review-card__text">«Отличная работа менеджеров! Помогли подобрать десерты под наш бюджет, сделали красивый макет торта с логотипом компании и доставили минута в минуту.»</p>
                    <div class="review-card__author"><div class="review-card__avatar">МП</div><div><div class="review-card__name">Мария Петрова</div><div class="review-card__company">Ресторан «Гастрономика»</div></div></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= ПОДВАЛ САЙТА ================= -->
    <footer class="footer">
        <div class="container">
            <div class="footer__grid">
                <div>
                    <div class="footer__brand">Love&<span>Sweets</span></div>
                    <p class="footer__text">Мы выбрали говорить с миром одним из самых вкусных способов. Семейная кондитерская «Любовь и сладости».</p>
                </div>
                <div>
                    <div class="footer__title">Меню</div>
                    <div class="footer__links">
                        <a href="index.php">Главная</a>
                        <a href="blog.php">Блог</a>
                        <a href="#callback">Контакты</a>
                        <a href="admin.php">Админ-панель</a>
                    </div>
                </div>
                <div>
                    <div class="footer__title">Контакты</div>
                    <div class="footer__links">
                        <a href="tel:+74993220020">+7 499 322-00-20</a>
                        <a href="mailto:zakaz.loveandsweets@gmail.com">zakaz.loveandsweets@gmail.com</a>
                        <a href="https://t.me/loveandsweets" target="_blank" rel="noopener noreferrer">Telegram</a>
                        <a href="https://vk.com/loveandsweets" target="_blank" rel="noopener noreferrer">Вконтакте</a>
                        <a href="https://www.instagram.com/love__and__sweets" target="_blank" rel="noopener noreferrer">Instagram*</a>
                        <p class="footer__disclaimer">*Деятельность организации запрещена на территории РФ</p>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <span>© 2023 Любовь и сладости. Все права защищены.</span>
                <span><a href="privacy.html" target="_blank" rel="noopener noreferrer">Политика конфиденциальности</a></span>
                <span><a href="consent.html" target="_blank" rel="noopener noreferrer">Согласие на обработку персональных данных</a></span>
                <span><a href="https://loveandsweets.ru/upload/agreement.pdf" target="_blank" rel="noopener noreferrer">Пользовательское соглашение</a></span>
                <span>Разработано в sēns.collective</span>
            </div>
        </div>
    </footer>

    <!-- ================= СКРИПТЫ ================= -->
     <script>
        document.querySelector('.burger')?.addEventListener('click', function () {
            alert('Для полноценной работы мобильного меню требуется выезжающая панель.');
        });

        (function () {
            const form = document.getElementById('feedback-form');
            if (!form) return;

            const btn = document.getElementById('submit-btn');
            const hint = document.getElementById('submit-hint');
            const consent = document.getElementById('consent');
            const phone = document.getElementById('phone');
            const success = document.getElementById('form-success');

            const clean = (text) => text.trim().replace(/[<>]/g, '');

            function setError(fieldId, errId, hasError) {
                document.getElementById(fieldId).classList.toggle('invalid', hasError);
                document.getElementById(errId).classList.toggle('show', hasError);
            }

            function updateButton() {
                btn.disabled = !consent.checked;
                hint.style.display = consent.checked ? 'none' : 'block';
                document.getElementById('err-consent').classList.toggle('show', false);
            }
            consent.addEventListener('change', function () {
                updateButton();
                if (!consent.checked) document.getElementById('err-consent').classList.add('show');
            });
            updateButton();

            phone.addEventListener('input', function () {
                let d = phone.value.replace(/\D/g, '');
                if (d[0] === '7' || d[0] === '8') d = d.slice(1);
                d = d.slice(0, 10);
                let out = '';
                if (d.length) out = '+7 (' + d.slice(0, 3);
                if (d.length >= 3) out += ') ' + d.slice(3, 6);
                if (d.length >= 6) out += '-' + d.slice(6, 8);
                if (d.length >= 8) out += '-' + d.slice(8, 10);
                phone.value = out;
            });

            function validate() {
                let ok = true;
                const event = document.getElementById('event-type');
                const eventBad = !event.value;
                setError('event-type', 'err-event', eventBad);

                const products = document.getElementById('products-desc');
                const productsBad = clean(products.value).length < 3;
                setError('products-desc', 'err-products', productsBad);

                const wishes = document.getElementById('wishes');
                const wishesBad = wishes.value.length > 1000;
                setError('wishes', 'err-wishes', wishesBad);

                const name = document.getElementById('name');
                const nameBad = !/^[A-Za-zА-Яа-яЁё\s'\-]{2,60}$/.test(clean(name.value));
                setError('name', 'err-name', nameBad);

                const phoneBad = phone.value.replace(/\D/g, '').length !== 11;
                setError('phone', 'err-phone', phoneBad);

                return !(eventBad || productsBad || wishesBad || nameBad || phoneBad);
            }

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                if (!consent.checked) {
                    document.getElementById('err-consent').classList.add('show');
                    return;
                }
                if (document.getElementById('website').value !== '') return;
                if (!validate()) return;

                const data = {
                    event_type: document.getElementById('event-type').value,
                    products_desc: clean(document.getElementById('products-desc').value),
                    wishes: clean(document.getElementById('wishes').value),
                    name: clean(document.getElementById('name').value),
                    phone: phone.value
                };

                success.textContent = 'Отправка...';
                success.classList.add('show');
                success.style.color = '#1E6B30';

                fetch('submit.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        ...data,
                        consent: '1',
                        website: ''
                    })
                })
                .then(response => response.json())
                .then(result => {
                    if (result.ok) {
                        success.textContent = 'Спасибо, ' + data.name + '! Заявка принята, менеджер свяжется с вами.';
                        form.reset();
                        updateButton();
                    } else {
                        success.textContent = 'Ошибка: ' + result.error;
                        success.style.color = '#D93025';
                    }
                })
                .catch(error => {
                    success.textContent = 'Ошибка сети. Проверьте подключение и попробуйте позже.';
                    success.style.color = '#D93025';
                });
            });
        })();
    </script>
</body>
</html>