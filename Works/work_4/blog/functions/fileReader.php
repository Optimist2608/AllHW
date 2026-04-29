<?php
function fileReader(?string $filePath): ?array
{ // назвал так потому что еще для категорий использовать буду
    try {
        $fileJson = file_get_contents(dirname(__DIR__) . $filePath);
        $fileContent = json_decode($fileJson, true, JSON_THROW_ON_ERROR);
        if ($fileJson === false) {
            $fileContent = null;
            throw new Exception("Ошибка чтения, 500 error");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $fileContent;
}