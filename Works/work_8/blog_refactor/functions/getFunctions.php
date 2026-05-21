<?php
require_once __DIR__ . "/fileDataDecode.php";
require_once __DIR__ . "/redirectToError.php";


function getPost(int $id, bool $needIndex = false): array
{
    $posts = getPosts();
    if ($id < 0 || $id >= count($posts)) {
        redirectToError();
    }
    $currentPostIndex = array_search($id, array_column($posts, "id"));
    if ($currentPostIndex === false) {
        redirectToError(500);
    }
    $post = $posts[(int)$currentPostIndex];
    return $needIndex ? [
        "post" => $post,
        "index" => $currentPostIndex
    ] : $post;
}

function getPosts(): array
{
    return fileDataDecode("posts");
}

function getCategories(): array
{
    return fileDataDecode("categories");
}

function getDeletePostCash(): array
{
    return fileDataDecode("deletePostsCash");
}
