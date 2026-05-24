<?php
function getPost(int $id, bool $needIndex = false): array
{
    $posts = array_values(getPosts());
    if ($id < 0) {
        redirectToError();
    }
    $currentPostIndex = array_search($id, array_column($posts, "id")); //крутая фишка из документации в php
    if ($currentPostIndex === false) {
        redirectToError(404);
    }
    $post = $posts[$currentPostIndex];
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

function getDeletePostCache(): array
{
    return fileDataDecode("deletePostsCache");
}
