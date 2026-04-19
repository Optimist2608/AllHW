<?php
// Задание 1
//$i =0;
//$endCount = 100;
//$isStart = false;
//while ($i <= $endCount) {
//    if (!$isStart) {
//        echo "Вот все числа от $i до $endCount, которые кратны 3:" . PHP_EOL;
//        $isStart = true;
//    }
//    if (($i % 3) === 0 ) {
//           echo $i. ", ";
//    }
//    $i++;
//}

// Задание 2
//$isComplete = false;
//do {
//    $age = readline("Сколько вам лет: ");
//    if ($age >= 0 && $age <= 100) {
//        $isComplete = true;
//        echo "Вы прошли проверку на робота" . PHP_EOL;
//    } else {
//        echo 'Как сказал Станиславский "Не верю!"' . PHP_EOL;
//    }
//} while (!$isComplete);

// Задание 4
//$n = random_int(0,15);
//$i = 0; // создал если нужно именно прогнать от 0 до 15
//$isSearching = false;
// Я считаю switch не для этого создан
//while ($i <= 15) {
//    if(!$isSearching) {
//        $isSearching = true;
//        echo "n = $n" . PHP_EOL;
//    }
//    if ($i >= $n) {
//        if ($i === 15) {
//            echo "$i";
//            break;
//        }
//        echo "$i, ";
//    }
//    $i++;
//}

//$isSearching = false;
//while ($n <= 15) {
//    if(!$isSearching) {
//        $isSearching = true;
//        echo "n = $n" . PHP_EOL;
//    }
//    if ($n === 15) {
//        echo "$n";
//        break;
//    }
//    echo "$n, ";
//    $n++;
//}

// Задание 5
$victorinaIsStarted = false;
$isEnd = false;
$iq = 100;
do {
    if (!$victorinaIsStarted) {
        $victorinaIsStarted = true;
        echo "Добро пожаловать на викторину, сегодня мы узнаем сколько у вас IQ" . PHP_EOL;
    }
    echo PHP_EOL;
    echo "Сколько будет 2+2?". PHP_EOL;
    echo  "Варианты ответов: 2, 3, 4" . PHP_EOL;
    $answer = readline("Ваш ответ: ");
    switch ($answer) {
        case 2:
        case 3:
            $isEnd = true;
            if ($iq > 0) {
                $iq -= 10;
            }
            echo "Не верно!". PHP_EOL;
            break;
        case 4:
            $isEnd = true;
            echo "Поздравляю, правильный ответ!". PHP_EOL;
            break;
        default: if ($iq > 0) {
            $iq -= 10;
        } break;
    }
} while (!$isEnd);
echo "Ваш IQ: $iq". PHP_EOL;