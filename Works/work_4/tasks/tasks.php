<?php
// Задание 1
$magicNumbersArray = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
function evenOdd(array $array):array {
    $outArray = [];
    foreach ($array as $count) {
        $outArray[] = $count % 2 === 0 ? "четное" : 'нечетное';
    }
    return $outArray;
}
print_r(evenOdd($magicNumbersArray)) ;

$evenOddMap = fn (int $count):string => $count % 2 === 0 ? "четное" : 'нечетное';
print_r(array_map($evenOddMap, $magicNumbersArray));

// Задание 2
$mas = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
function aggregationData(array $array) :array {
    sort($array);
    $min = $array[0];
    $max = $array[count($array) - 1];
    $avg = array_sum($array);
    return [
        'min' => $min,
        'max' => $max,
        'avg' => $avg,
    ];
}
print_r(aggregationData($magicNumbersArray));

// Задание 3
$randomNumArray = [];
while (count($randomNumArray) < 100) {
    $randomNum = mt_rand(1, 200);
    if (!in_array($randomNum, $randomNumArray)) {
        $randomNumArray[] = $randomNum;
    }
}
print_r($randomNumArray);

$randomNumArray = [];
$randomNumArray = array_fill(0, 100, 0); // 40 минут думал, мозг ломал себе, есть ли иной способ?
$callbackMakeRandom = function (int $value) use ($randomNumArray) :int{
    do {
        $value = mt_rand(1, 200);
        if (!in_array($value, $randomNumArray)) {
            return $value;
        }
    }
    while (true);
};
print_r(array_map($callbackMakeRandom, $randomNumArray));

// Задание 4

$mas = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
$min = null;
$max = null;

foreach ($mas as $count) { // легко в отличии от 3 задания под звездочкой тут за 3 мин сделал
    if (is_null($min) || $min > $count) {
        $min = $count;
    }
    if (is_null($max) || $max < $count) {
        $max = $count;
    }
}
$sum = $min + $max;
print_r("Sum:" . $sum);