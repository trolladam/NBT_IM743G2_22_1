<?php

header('Content-Type: application/json; charset=UTF-8');

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id == null) {
    http_response_code(404);
    $response = ['errors' => ['Page not found']];
    die(json_encode($response));
}

$album = get_album_by_id($id);

if ($album == null) {
    http_response_code(404);
    die(json_encode(['errors' => ['Album not found']]));
}

$errors = [];

if (!isset($_FILES['image']) || $_FILES['image']['size'] <= 0) {
    http_response_code(400);
    die(json_encode(['errors' => ['Cover image is required']]));
}

$target_dir = BASE_PATH . "/img/uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

$imgeFileType = strtolower(
    pathinfo($target_file, PATHINFO_EXTENSION)
);

$check = getimagesize($_FILES['image']['tmp_name']);
if ($check == false) {
    $errors[] = "The selected file is not an image. File type: {$check['mime']}.";
}

if (file_exists($target_file)) {
    $errors[] = "The selected file already exists.";
}

if ($_FILES['image']['size'] > (MAX_UPLOAD_SIZE * 1000000)) {
    $errors[] = "The selected file is too large. Maximum upload size: " . MAX_UPLOAD_SIZE . "MB";
}

$allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];

if (!in_array($imgeFileType, $allowedFormats)) {
    $errors[] = "The selected file format is not allowed. Try these: " . implode(", ", $allowedFormats);
}


if (count($errors) > 0) {
    http_response_code(400);
    die(json_encode(['errors' => $errors]));
}


if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
    http_response_code(500);
    die(json_encode(['errors' => ['Something happend']]));
}

$sql = $db->prepare("UPDATE albums SET cover=? WHERE id=?");
$sql->bind_param('si', $_FILES['image']['name'], $id);
$sql->execute();
$sql->close();

$json = [
    'image_url' => asset('img/uploads/' . $_FILES['image']['name']),
    'message' => 'Image uploaded successfully',
];
http_response_code(200);
die(json_encode($json));
