<?php
function isFilterPost($post, $category): bool
{
    $isFiltered = false;
    foreach ($category as $aproveId) {
        if ($aproveId == $post["id"]) {
            $isFiltered = true;
            break;
        }
    }
    return $isFiltered;
}