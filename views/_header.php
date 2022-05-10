<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo site</title>

    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>">
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <a href="<?php echo page_url('home'); ?>">Home</a>
                <a href="<?php echo page_url('about'); ?>">About</a>
                <a href="<?php echo page_url('upload'); ?>">Upload</a>
            </nav>
        </div>
    </header>
    <main class="container">
        <!-- Main content comes here -->
