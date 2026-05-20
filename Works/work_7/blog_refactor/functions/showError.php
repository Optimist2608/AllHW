<?php
function showError(string $error, bool $is404Error = true): void
{
    $is404Error ? $typeError = "404" : $typeError = "500";
    header("Location: $typeError.php?error=$error");
    die();
}