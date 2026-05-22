<?php
require_once __DIR__ . "/importer.php";

function deletePostsCache(): void
{ /* Можете объясниить что тут происходит я так понял это ответ json на мое действие делал эту функцию через ии тк не понимал
    как принять fetch с фронта через $_POST неработает */
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);
    if (!isset($input['id'])) {
        redirectToError();
    }
    $filePath = __DIR__ . '/data/deletePostsCache.json';
    $cash = json_decode(file_get_contents($filePath), true) ?? [];
    $cash[] = ['id' => (int)$input['id']];
    putArrayToJSON($cash, "deletePostsCache");
    echo json_encode(['success' => true]);
    exit;
}