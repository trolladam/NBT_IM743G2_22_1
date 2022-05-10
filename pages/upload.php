<?php
if (is_post()) {
    // todo: validate
    // todo: save values in the database
    // todo: success message
    dd($_POST);
}
?>
<div class="page page-upload">
    <form class="card" action="<?php echo page_url('upload'); ?>" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title">
        </div>
        <div class="form-group">
            <label for="artist">Artist</label>
            <input class="form-control" type="text" name="artist">
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input class="form-control" type="number" name="year">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div>
            <button class="btn" type="submit">Upload</button>
        </div>
    </form>
</div>
