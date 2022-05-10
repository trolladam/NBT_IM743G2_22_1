<?php

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    redirect('404');
}

$album = get_album_by_id($id);

if ($album === null) {
    redirect('404');
}

?>
<?php include_once './views/_header.php'; ?>
<div class="page page-details">
    <h1><?= $album['title']; ?></h1>
    <div class="description">
        <?= $album['description']; ?>
    </div>
    <p>Released by <?= $album['artist']; ?></p>
    <p>Released in <?= $album['year']; ?></p>
</div>
<?php include_once "./views/_footer.php"; ?>
