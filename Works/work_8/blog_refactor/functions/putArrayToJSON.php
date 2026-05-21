<?php
function putArrayToJSON(array $array, string $jsonName): void
{
    $newJson = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents(dirname(__DIR__) . "/data/$jsonName.json", $newJson);
}