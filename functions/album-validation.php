<?php
if ($title == null) {
    $errors['title'][] = "Title is required";
} else {
    if (strlen($title) < 2) {
        $errors['title'][] = "The title must be at least 2 characters long";
    }
    if (strlen($title) > 255) {
        $errors['title'][] = "The title must be less then 255 characters long";
    }
}

if ($artist == null) {
    $errors['artist'][] = "Artist is required";
}

if ($year == null) {
    $errors['year'][] = "Year is required";
} else {
    if (!is_numeric($year)) {
        $errors['year'][] = "Year must be a number";
    }
}

if ($description == null) {
    $errors['description'][] = "Description is required";
} else {
    if (strlen($description) < 100) {
        $errors['description'][] = "Description must be at least 100 characters long";
    }
}
