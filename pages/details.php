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
<div class="page page-details">
    <h1><?= $album['title']; ?></h1>
    <p><?= $album['description']; ?></p>
    <p>Released by <?= $album['artist']; ?></p>
    <p>Released in <?= $album['year']; ?></p>
</div>
