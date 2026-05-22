<?php
require_once __DIR__ . "/importer.php";
require_once __DIR__ . "/debug.php";
function savePost(): void
{
    $posts = getPosts();
    $categoriesCount = count(getCategories());
    $title = $_POST['title'];
    $description = $_POST['description'];
    $author = $_POST['author'];
    $categoryId = $_POST['categoryId'];

    if (empty($title) || empty($description) || empty($author) || empty($categoryId)) {
        redirectToError(400);
    }


    if ((int)$categoryId < 0 || (int)$categoryId >= $categoriesCount) {
        redirectToError(400);
    }
    if (validateString($title, 5)) {
        redirectToError(400);
    }
    if (validateString($description, 15)) {
        redirectToError(400);
    }
    if (validateString($author, 3)) {
        redirectToError(400);
    }

    $maxId = 0;

    foreach ($posts as $post) {
        if ($post['id'] > $maxId) {
            $maxId = $post['id'];
        }
    };

    $nextStepId = 1;
    $newId = $maxId + $nextStepId;
    $posts[] = [
        "id" => $newId,
        "title" => $title,
        "description" => $description,
        "categoryId" => (int)$categoryId,
        "date" => date("Y-m-d"),
        "author" => $author,

    ];

    putArrayToJSON($posts, "posts");
    header("Location: /post.php?id=$newId");
    die();
}