<?php
function putArrayToJSON(array $array, string $jsonName, bool $isSort = true): void
{
    $isSort && usort($array, fn($a, $b) => $a["id"] <=> $b["id"]); // вся магия тут
    $newJson = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents(dirname(__DIR__) . "/data/$jsonName.json", $newJson);
}