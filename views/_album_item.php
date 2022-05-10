<div class="album-item">
    <a href="<?= page_url('details', ['id' => $album['id']]); ?>">
        <img src="https://via.placeholder.com/350" alt="<?= $album['title']; ?>">
    </a>
    <a href="<?= page_url('details', ['id' => $album['id']]); ?>">
        <?= $album['title']; ?> (<?= $album['year']; ?>)
    </a>
</div>
