<?php if (!defined("APP_VERSION")) {
    exit;
} ?>
<?php

// todo: implement registration form
// todo: implement form validation: requireder fields, valid email, password check
//

$user = [
    'email' => 'john.doe@example.com',
    'password' => '#Aa123456',
    'name' => 'John Doe',
];

$password = password_hash($user['password'], PASSWORD_DEFAULT);

$sql = $db->prepare("INSERT INTO users (email, password, name) VALUES (?, ?, ?)");
$sql->bind_param('sss', $user['email'], $password, $user['name']);
$sql->execute();
$sql->close();


dd('ok');
