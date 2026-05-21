<?php
function calculate(array $nums = [], string $operator = ""): float
{
    //валидацию надо
    return match ($operator) {
        "+" => array_sum($nums),
        "-" => array_reduce(array_slice($nums, 1),
            fn($carry, $item) => $carry - $item,
            $nums["num1"]
        ),
        "*" => array_product($nums),
        "/" => array_reduce(array_slice($nums, 1),
            fn($carry, $item) => $carry / $item,
            $nums["num1"]
        ),
    };
}
