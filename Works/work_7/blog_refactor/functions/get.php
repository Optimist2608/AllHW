<?php
require_once __DIR__ . "/fileDataDecode.php";
require_once __DIR__ . "/showError.php";
function getPost(int $id): array
{
    $posts = getPosts();
    $post = $posts[$id];
    if ($id === null || $id > count($posts) || $id < 0) {
        showError("Поста с id:$id не существует");
    }
    return $post;
}

function getPosts(): array
{
    return fileDataDecode("posts");
}

function getCategories(): array
{
    return fileDataDecode("categories");
}