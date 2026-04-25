<?php
// Задание 1
$i = 0;
const END_COUNT = 100;
echo "Вот все числа от $i до" . END_COUNT . ", которые кратны 3:" . PHP_EOL;
while ($i <= END_COUNT) {
    if (($i % 3) === 0) {
        echo "$i, ";
    }
    $i++;
}

echo PHP_EOL; // отступ между заданиями

// Задание 2
do {
    $age = readline("Сколько вам лет: ");
    if ($age >= 0 && $age <= 100) {
        $isComplete = true;
        echo "Вы прошли проверку на робота" . PHP_EOL;
        break;
    } else {
        echo 'Как сказал Станиславский "Не верю!"' . PHP_EOL;
    }
} while (true);

echo PHP_EOL; // отступ между заданиями

// Задание 4
$n = random_int(0, 15);
echo "n = $n" . PHP_EOL;

while ($n <= 15) {
    if ($n === 15) {
        echo "$n";
        break;
    }
    echo "$n, ";
    $n++;
}

switch ($n) {
    case 0:
        echo $n . PHP_EOL;
        $n++;
    case 1:
        echo $n . PHP_EOL;
        $n++;
    case 2:
        echo $n . PHP_EOL;
        $n++;
    case 3:
        echo $n . PHP_EOL;
        $n++;
    case 4:
        echo $n . PHP_EOL;
        $n++;
    case 5:
        echo $n . PHP_EOL;
        $n++;
    case 6:
        echo $n . PHP_EOL;
        $n++;
    case 7:
        echo $n . PHP_EOL;
        $n++;
    case 8:
        echo $n . PHP_EOL;
        $n++;
    case 9:
        echo $n . PHP_EOL;
        $n++;
    case 10:
        echo $n . PHP_EOL;
        $n++;
    case 11:
        echo $n . PHP_EOL;
        $n++;
    case 12:
        echo $n . PHP_EOL;
        $n++;
    case 13:
        echo $n . PHP_EOL;
        $n++;
    case 14:
        echo $n . PHP_EOL;
        $n++;
    case 15:
        echo $n . PHP_EOL;
    break;
}

echo PHP_EOL; // отступ между заданиями

// Задание 5
echo "Добро пожаловать на викторину, сегодня мы узнаем сколько у вас IQ" . PHP_EOL;
do {
    echo PHP_EOL;
    echo "Сколько будет 2+2?" . PHP_EOL;
    echo "Варианты ответов: 2, 3, 4" . PHP_EOL;
    $answer = readline("Ваш ответ: ");
    switch ($answer) {
        case 2:
        case 3:
            echo "Не верно!" . PHP_EOL;
            break(2);
        case 4:
            echo "Поздравляю, правильный ответ!" . PHP_EOL;
            break(2);
    }
} while (true);
