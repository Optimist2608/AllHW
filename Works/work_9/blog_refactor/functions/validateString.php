<?php
function validateString(string $item, int $minSymbols): bool
{
    $trimmed = trim($item);
    return empty($trimmed) || iconv_strlen($trimmed) <= $minSymbols;
}