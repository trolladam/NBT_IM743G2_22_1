<div class="album-item">
    <a href="<?= page_url('details', ['id' => $album['id']]); ?>">
        <?php if ($album['cover']) : ?>
            <img src="<?= asset("img/uploads/{$album['cover']}"); ?>" alt="">
        <?php else : ?>
            <img src="https://via.placeholder.com/350" alt="<?= $album['title']; ?>">
        <?php endif; ?>
    </a>
    <a href="<?= page_url('details', ['id' => $album['id']]); ?>">
        <?= $album['title']; ?> (<?= $album['year']; ?>)
    </a>
</div>
