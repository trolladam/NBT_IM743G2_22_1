<?php

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = ($current_page - 1) * PAGE_LIMIT;

$albums = get_album_list($limit);

$total_pages = ceil(get_album_count() / PAGE_LIMIT);

?>
<h1>
    Home page
</h1>

<div class="album-list">
    <?php while ($album = $albums->fetch_assoc()) : ?>
        <?php require BASE_PATH . '/views/_album_item.php'; ?>
    <?php endwhile; ?>
</div>
<nav class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <a href="<?= page_url('home', ['page' => $i]); ?>" <?= $i == $current_page ? 'class="active"' : ''; ?>>
            <?= $i; ?>
        </a>
    <?php endfor; ?>
</nav>
