<?php
function searchPost(?string $postsFilePath): ?array
{
    try {
        $postsJson = file_get_contents(dirname(__DIR__) . $postsFilePath);
        $posts = json_decode($postsJson, true, JSON_THROW_ON_ERROR);
        if ($postsJson === false) {
            $posts = null;
            throw new Exception("Ошибка чтения, 500 error");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $searchId = $_GET["id"] ?? null;
    $searchPost = null;
    foreach ($posts as $post) {
        if ($searchId == $post['id']) {
            $searchPost = $post;
            break;
        }
    }
    return $searchPost;
}