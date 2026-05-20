<?php

function fileDataReader(string $fileData): string
{
    $filePath = dirname(__DIR__) . "/data/$fileData.json";
    if (!file_exists($filePath)) {
        http_response_code(404);
        throw new RuntimeException("Файл не найден: $fileData");
    }
    $jsonResponse = file_get_contents($filePath);
    if ($jsonResponse === false) {
        http_response_code(500);
        throw new RuntimeException("Ошибка чтения файла: $fileData");
    }
    if (empty($jsonResponse)) {
        http_response_code(500);
        throw new RuntimeException("Файл $fileData пуст");
    }
    return $jsonResponse;
}


function fileDataDecode(string $fileData): array
{
    $dataArray = json_decode(fileDataReader($fileData), true, 512, JSON_THROW_ON_ERROR);
    if (!is_array($dataArray)) {
        http_response_code(500);
        throw new RuntimeException("Данные в файле $fileData не являются массивом");
    }
    return $dataArray;
}

