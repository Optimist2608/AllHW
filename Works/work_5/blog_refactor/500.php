<?php
$error = $_GET["error"] ?? "Проблема с сервером";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Problems with server</title>
    <link rel="stylesheet" href="/style/style.css"/>
</head>
<body>
<?php require __DIR__ . '/components/header.php'; ?>
<main class="error-page">
    <p class="detail-error" style="align-self: flex-start; color: white;">
        Ошибка 500. <?= htmlspecialchars($error) ?>
    </p>
    <svg class="svg-500" width="600" height="300" viewBox="0 0 600 300" xmlns="http://www.w3.org/2000/svg">
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
            .svg-500 {
                background: transparent;
                overflow: visible;
            }

            .svg-500 #rotor500 {
                transform-box: fill-box;
                transform-origin: center;
                animation: rotate500 2.8s linear infinite;
            }

            @keyframes rotate500 {
                0% {
                    transform: perspective(800px) rotateY(0deg);
                }
                100% {
                    transform: perspective(800px) rotateY(360deg);
                }
            }

            .svg-500 .depth1,
            .svg-500 .depth2,
            .svg-500 .depth3,
            .svg-500 .front,
            .svg-500 .shine {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 140px;
                font-weight: 900;
                text-anchor: middle;
                dominant-baseline: middle;
                letter-spacing: 8px;
            }

            .svg-500 .depth1 {
                fill: #7a2d00;
                opacity: 0.30;
            }

            .svg-500 .depth2 {
                fill: #9a3a00;
                opacity: 0.24;
            }

            .svg-500 .depth3 {
                fill: #b84a00;
                opacity: 0.18;
            }

            .svg-500 .front {
                fill: url(#frontGradient500);
                stroke: #ffd9bf;
                stroke-width: 2.5;
                filter: url(#glow500);
            }

            .svg-500 .shine {
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
    </svg>
</main>
</body>
</html>
