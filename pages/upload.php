<?php

if (is_post()) {

    $title = trim($_POST['title']);
    $artist = trim($_POST['artist']);
    $year = trim($_POST['year']);
    $description = trim($_POST['description']);

    require BASE_PATH . '/functions/album-validation.php';

    if (count($errors) == 0) {
        // todo change this later
        $user_id = 1;

        $sql = $db->prepare("INSERT INTO albums (user_id, title, artist, year, description) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param('issis', $user_id, $title, $artist, $year, $description);
        $sql->execute();
        $sql->close();

        $new_id = $db->insert_id;

        redirect("edit", ['id' => $new_id]);
    }
}

$action_url = page_url('upload');

?>
<?php include_once './views/_header.php'; ?>
<div class="page page-upload">
    <?php require BASE_PATH . '/views/_album_form.php'; ?>
</div>
<?php include_once "./views/_footer.php"; ?>
