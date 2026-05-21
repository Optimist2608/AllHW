<?php
function redirectToError(int $typeError = 404): void
{
    header("Location: error-handler.php?code=$typeError");
    die();
}