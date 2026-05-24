<?php
$errorConfig = [
    404 => [
        'title' => 'Страница не найдена',
        'message' => 'Запрашиваемая страница не существует или была перемещена.',
        'suggestions' => [
            'Проверьте правильность URL адреса',
            'Вернитесь на главную страницу',
            'Воспользуйтесь поиском по сайту'
        ],
        "svg" => '<svg class="error-svg" width="400" height="100" viewBox="0 0 600 300" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="frontGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#ffd2b3"/>
                <stop offset="35%" stop-color="rgb(255, 145, 60)"/>
                <stop offset="70%" stop-color="rgb(219, 91, 5)"/>
                <stop offset="100%" stop-color="#9f3d00"/>
            </linearGradient>

            <filter id="glow" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur stdDeviation="4" result="blur"/>
                <feMerge>
                    <feMergeNode in="blur"/>
                    <feMergeNode in="SourceGraphic"/>
                </feMerge>
            </filter>
        </defs>

        <style>
            .error-svg {
                background: transparent;
                overflow: visible;
            }

            .error-svg #rotor {
                transform-box: fill-box;
                transform-origin: center;
                animation: rotateError 2.8s linear infinite;
            }

            @keyframes rotateError {
                0% {
                    transform: perspective(800px) rotateY(0deg);
                }
                100% {
                    transform: perspective(800px) rotateY(360deg);
                }
            }

            .error-svg .depth1,
            .error-svg .depth2,
            .error-svg .depth3,
            .error-svg .front,
            .error-svg .shine {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 140px;
                font-weight: 900;
                text-anchor: middle;
                dominant-baseline: middle;
                letter-spacing: 8px;
            }

            .error-svg .depth1 {
                fill: #7a2d00;
                opacity: 0.30;
            }

            .error-svg .depth2 {
                fill: #9a3a00;
                opacity: 0.24;
            }

            .error-svg .depth3 {
                fill: #b84a00;
                opacity: 0.18;
            }

            .error-svg .front {
                fill: url(#frontGradient);
                stroke: #ffd9bf;
                stroke-width: 2.5;
                filter: url(#glow);
            }

            .error-svg .shine {
                fill: none;
                stroke: rgba(255, 255, 255, 0.45);
                stroke-width: 1.5;
            }
        </style>

        <g id="rotor">
            <text class="depth1" x="308" y="158">404</text>
            <text class="depth2" x="304" y="154">404</text>
            <text class="depth3" x="302" y="152">404</text>

            <text class="front" x="300" y="150">404</text>
            <text class="shine" x="300" y="150">404</text>
        </g>
    </svg>
        '
    ],
    500 => [
        'title' => 'Внутренняя ошибка сервера',
        'message' => 'На сервере произошла техническая ошибка.',
        'suggestions' => [
            'Попробуйте обновить страницу через несколько минут',
            'Очистите кэш браузера',
            'Сообщите об ошибке администратору',
            'Попробуйте зайти позже'
        ],
        "svg" => '<svg class="error-svg" width="600" height="300" viewBox="0 0 600 300" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="frontGradient500" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#ffd2b3"/>
                <stop offset="35%" stop-color="rgb(255, 145, 60)"/>
                <stop offset="70%" stop-color="rgb(219, 91, 5)"/>
                <stop offset="100%" stop-color="#9f3d00"/>
            </linearGradient>

            <filter id="glow500" x="-50%" y="-50%" width="200%" height="200%">
                <feGaussianBlur stdDeviation="4" result="blur"/>
                <feMerge>
                    <feMergeNode in="blur"/>
                    <feMergeNode in="SourceGraphic"/>
                </feMerge>
            </filter>
        </defs>

        <style>
            .error-svg {
                background: transparent;
                overflow: visible;
            }

            .error-svg #rotor500 {
                transform-box: fill-box;
                transform-origin: center;
                animation: rotateError 2.8s linear infinite;
            }

            @keyframes rotateError {
                0% {
                    transform: perspective(800px) rotateY(0deg);
                }
                100% {
                    transform: perspective(800px) rotateY(360deg);
                }
            }

            .error-svg .depth1,
            .error-svg .depth2,
            .error-svg .depth3,
            .error-svg .front,
            .error-svg .shine {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 140px;
                font-weight: 900;
                text-anchor: middle;
                dominant-baseline: middle;
                letter-spacing: 8px;
            }

            .error-svg .depth1 {
                fill: #7a2d00;
                opacity: 0.30;
            }

            .error-svg .depth2 {
                fill: #9a3a00;
                opacity: 0.24;
            }

            .error-svg .depth3 {
                fill: #b84a00;
                opacity: 0.18;
            }

            .error-svg .front {
                fill: url(#frontGradient500);
                stroke: #ffd9bf;
                stroke-width: 2.5;
                filter: url(#glow500);
            }

            .error-svg .shine {
                fill: none;
                stroke: rgba(255, 255, 255, 0.45);
                stroke-width: 1.5;
            }
        </style>

        <g id="rotor500">
            <text class="depth1" x="308" y="158">500</text>
            <text class="depth2" x="304" y="154">500</text>
            <text class="depth3" x="302" y="152">500</text>

            <text class="front" x="300" y="150">500</text>
            <text class="shine" x="300" y="150">500</text>
        </g>
    </svg>'
    ],
    400 => [
        'title' => 'Неверный запрос',
        'message' => 'Сервер не может обработать запрос из-за синтаксической ошибки.',
        'suggestions' => [
            'Проверьте правильность введённых данных',
            'Очистите cookies и кэш браузера',
            'Попробуйте отправить запрос позже',
            'Свяжитесь с поддержкой, если ошибка повторяется'
        ],
        "svg" => '<svg class="error-svg" width="600" height="300" viewBox="0 0 600 300" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <linearGradient id="frontGradient400" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#ffd2b3"/>
            <stop offset="35%" stop-color="rgb(255, 145, 60)"/>
            <stop offset="70%" stop-color="rgb(219, 91, 5)"/>
            <stop offset="100%" stop-color="#9f3d00"/>
        </linearGradient>

        <filter id="glow400" x="-50%" y="-50%" width="200%" height="200%">
            <feGaussianBlur stdDeviation="4" result="blur"/>
            <feMerge>
                <feMergeNode in="blur"/>
                <feMergeNode in="SourceGraphic"/>
            </feMerge>
        </filter>
    </defs>

    <style>
        .error-svg {
            background: transparent;
            overflow: visible;
        }

        .error-svg #rotor400 {
            transform-box: fill-box;
            transform-origin: center;
            animation: rotateError 2.8s linear infinite;
        }

        @keyframes rotateError {
            0% {
                transform: perspective(800px) rotateY(0deg);
            }
            100% {
                transform: perspective(800px) rotateY(360deg);
            }
        }

        .error-svg .depth1,
        .error-svg .depth2,
        .error-svg .depth3,
        .error-svg .front,
        .error-svg .shine {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 140px;
            font-weight: 900;
            text-anchor: middle;
            dominant-baseline: middle;
            letter-spacing: 8px;
        }

        .error-svg .depth1 {
            fill: #7a2d00;
            opacity: 0.30;
        }

        .error-svg .depth2 {
            fill: #9a3a00;
            opacity: 0.24;
        }

        .error-svg .depth3 {
            fill: #b84a00;
            opacity: 0.18;
        }

        .error-svg .front {
            fill: url(#frontGradient400);
            stroke: #ffd9bf;
            stroke-width: 2.5;
            filter: url(#glow400);
        }

        .error-svg .shine {
            fill: none;
            stroke: rgba(255, 255, 255, 0.45);
            stroke-width: 1.5;
        }
    </style>

    <g id="rotor400">
        <text class="depth1" x="308" y="158">400</text>
        <text class="depth2" x="304" y="154">400</text>
        <text class="depth3" x="302" y="152">400</text>

        <text class="front" x="300" y="150">400</text>
        <text class="shine" x="300" y="150">400</text>
    </g>
</svg>'
    ]
];

$code = (int)$_GET['code'];

if (!array_key_exists($code, $errorConfig)) {
    $code = 404;
}

$config = $errorConfig[$code];
header("X-Robots-Tag: noindex, nofollow");
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ошибка <?= $code ?> | <?= htmlspecialchars($config['title']) ?></title>
    <link rel="stylesheet" href="/style/style.css"/>
    <style>
        /* Дополнительные стили только для страницы ошибок */
        .error-page {
            min-height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px 20px;
        }

        .error-svg {
            max-width: 100%;
            height: auto;
            margin-bottom: 30px;
        }

        .error-title {
            font-size: 3rem;
            color: rgb(219, 91, 5);
            margin-bottom: 20px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .error-message {
            font-size: 1.2rem;
            color: #e0e0e0;
            margin-bottom: 30px;
            max-width: 500px;
            line-height: 1.5;
        }

        .error-suggestions {
            list-style: none;
            padding: 0;
            margin: 0 0 30px 0;
        }

        .error-suggestions li {
            color: #b5b5b5;
            margin-bottom: 10px;
            font-size: 1rem;
            position: relative;
            padding-left: 20px;
        }

        .error-suggestions li::before {
            content: "•";
            color: rgb(219, 91, 5);
            font-size: 1.2rem;
            position: absolute;
            left: 0;
            top: -2px;
        }

        .error-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 10px;
        }

        .error-btn {
            display: inline-block;
            padding: 12px 24px;
            background: transparent;
            border: 2px solid rgb(219, 91, 5);
            color: rgb(219, 91, 5);
            text-decoration: none;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .error-btn:hover {
            background: rgb(219, 91, 5);
            color: #000;
            transform: scale(1.02);
        }

        .error-btn-primary {
            background: rgb(219, 91, 5);
            color: #000;
        }

        .error-btn-primary:hover {
            background: rgb(200, 70, 0);
            border-color: rgb(200, 70, 0);
            color: #fff;
        }

        @media (max-width: 768px) {
            .error-title {
                font-size: 2rem;
            }

            .error-message {
                font-size: 1rem;
            }

            .error-btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<?php require __DIR__ . '/components/header.php'; ?>
<main class="error-page">
    <?= $config['svg'] ?>

    <h1 class="error-title"><?= htmlspecialchars($config['title']) ?></h1>

    <p class="error-message"><?= htmlspecialchars($config['message']) ?></p>

    <?php if (!empty($config['suggestions'])): ?>
        <ul class="error-suggestions">
            <?php foreach ($config['suggestions'] as $suggestion): ?>
                <li><?= htmlspecialchars($suggestion) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="error-buttons">
        <a href="/" class="error-btn error-btn-primary">На главную</a>
        <a href="javascript:history.back()" class="error-btn">Вернуться назад</a>
    </div>
</main>
</body>
</html>