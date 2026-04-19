<?php
// Не корректное задание, что за N в первом столбце не очень понятно
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
        for ($i = 0; $i <= $n; $i++):
            if ($i % 2 == 0): ?>
                <tr>
                    <td class="even"><?= $i ?></td>
                </tr>
            <?php else: ?>
            <tr>
                <td class="odd"><?= $i ?></td>
            </tr>
            <?php endif; ?>
<?php endfor; ?>

        </tbody>
    </table>
<!--    <script src="./script.js"></script>-->
</body>
</html>