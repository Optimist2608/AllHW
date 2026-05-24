<?php
function deletePostsCache(): void
{
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