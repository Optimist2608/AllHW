<?php
function debug(mixed $debugElement, bool $needDie = true): void
{
    var_dump($debugElement);
    $needDie ? die() : null;
}