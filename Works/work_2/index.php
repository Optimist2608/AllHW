<?php
$n = 10;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<table>
    <tbody>

        <?php
        for ($i = 0; $i <= $n; $i++): ?>
        <tr><td class="<?= $i % 2 === 0 ? 'even': 'odd' ?>" ><?= $i ?></td></tr>
            <!-- <tr> не трогать это как отдельная колонка иначе верстка ломается -->
        <?php endfor; ?>

    </tbody>
</table>
<!--<script src="./script.js"> </script> -->
<!-- Как альтернатива JS-->
</body>
</html>