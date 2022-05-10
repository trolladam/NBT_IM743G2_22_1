<?php

session_start();

define('APP_VERSION', '1.0.0');

require_once "config.php";
require_once "functions.php";

$db = db_connect();

$page = isset($_GET['p']) ? $_GET['p'] : 'home';

$errors = [];

if (file_exists("./pages/{$page}.php")) {
    include "./pages/{$page}.php";
} else {
    include './pages/404.php';
}

db_close($db);
