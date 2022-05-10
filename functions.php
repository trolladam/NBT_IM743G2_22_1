<?php

function dd($variable)
{
    dump($variable);
    die('END');
}

function dump($variable)
{
    echo "<pre>";
    print_r($variable);
    echo "</pre>";
}
