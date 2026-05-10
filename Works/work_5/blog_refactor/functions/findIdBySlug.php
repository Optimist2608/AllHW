<?php
require_once __DIR__ . "/get.php";
require_once __DIR__ . "/showError.php";
function findIdBySlug(?string $slug): ?int
{
    if ($slug === null) {
        return null;
    }
    $categories = getCategories();
    foreach ($categories["categories"] as $category) {
        if ($category["slug"] === $slug) {
            return (int)$category["id"];
        }
    }
    showError("Категория не найдена");
}