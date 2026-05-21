<?php
require_once __DIR__ . "/getFunctions.php";
require_once __DIR__ . "/redirectToError.php";
function findIdBySlug(?string $slug): ?int
{
    if ($slug === null) {
        return null;
    }
    $categories = getCategories();
    foreach ($categories as $category) {
        if ($category["slug"] === $slug) {
            return (int)$category["id"];
        }
    }
    redirectToError();
}