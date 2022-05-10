<?php if (!defined("APP_VERSION")) {
    exit;
} ?>
<?php

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    redirect('404');
}

$album = get_album_by_id($id);

if ($album === null) {
    redirect('404');
}

if (is_post()) {
    $title = trim($_POST['title']);
    $artist = trim($_POST['artist']);
    $year = trim($_POST['year']);
    $description = trim($_POST['description']);

    require BASE_PATH . '/functions/album-validation.php';

    if (count($errors) == 0) {
        $sql = $db->prepare("UPDATE `albums` SET `title`=?, `artist`=?, `year`=?, `description`=? WHERE `id`=?");
        $sql->bind_param('ssisi', $title, $artist, $year, $description, $id);
        $sql->execute();
        $sql->close();

        redirect('edit', ['id' => $id, 'success' => 1]);
    }
}

// extracting array keys as variables
extract($album, EXTR_SKIP);

$action_url = page_url('edit', ['id' => $id]);
$image_upload_url = page_url('upload-image');

?>
<?php include_once './views/_header.php'; ?>
<div class="page page-edit">
    <?php if (isset($_GET['success'])) : ?>
        <div class="alert alert-success">
            Album saved successfully
        </div>
    <?php endif; ?>
    <?php require BASE_PATH . '/views/_album_form.php'; ?>
    <form id="upload-image" class="card" method="POST" action="<?= $image_upload_url; ?>" enctype="multipart/form-data">
        <h1>Upload cover image for <?= $album['title']; ?></h1>
        <div id="upload-response"></div>
        <div class="form-group">
            <label>Cover image</label>
            <input type="file" name="image" />
        </div>
        <div>
            <button class="btn" type="submit">Upload</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="<?= asset('js/upload-image.js'); ?>"></script>
<?php include_once "./views/_footer.php"; ?>
