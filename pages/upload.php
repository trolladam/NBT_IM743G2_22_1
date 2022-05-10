<?php

$errors = [];

if (is_post()) {

    $title = trim($_POST['title']);
    $artist = trim($_POST['artist']);
    $year = trim($_POST['year']);
    $description = trim($_POST['description']);

    if ($title == null) {
        $errors['title'][] = "Title is required";
    } else {
        if (strlen($title) < 2) {
            $errors['title'][] = "The title must be at least 2 characters long";
        }
        if (strlen($title) > 255) {
            $errors['title'][] = "The title must be less then 255 characters long";
        }
    }

    if ($artist == null) {
        $errors['artist'][] = "Artist is required";
    }

    if ($year == null) {
        $errors['year'][] = "Year is required";
    } else {
        if (!is_numeric($year)) {
            $errors['year'][] = "Year must be a number";
        }
    }

    if ($description == null) {
        $errors['description'][] = "Description is required";
    } else {
        if (strlen($description) < 100) {
            $errors['description'][] = "Description must be at least 100 characters long";
        }
    }

    if (count($errors) == 0) {
        // todo: save values in the database
        // todo: success message
        dd($_POST);
    }
}
?>
<div class="page page-upload">
    <form class="card" action="<?php echo page_url('upload'); ?>" method="POST">
        <div class="form-group<?php echo isset($errors['title']) ? ' has-error' : ''; ?>">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
            <?php if (isset($errors['title'])) : ?>
                <p class="validation-error">
                    <?php echo $errors['title'][0]; ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo isset($errors['artist']) ? ' has-error' : ''; ?>">
            <label for="artist">Artist</label>
            <input class="form-control" type="text" name="artist" value="<?php echo isset($artist) ? $artist : ''; ?>">
            <?php if (isset($errors['artist'])) : ?>
                <p class="validation-error">
                    <?php echo $errors['artist'][0]; ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo isset($errors['year']) ? ' has-error' : ''; ?>">
            <label for="year">Year</label>
            <input class="form-control" type="number" name="year" value="<?php echo isset($year) ? $year : ''; ?>">
            <?php if (isset($errors['year'])) : ?>
                <p class="validation-error">
                    <?php echo $errors['year'][0]; ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo isset($errors['description']) ? ' has-error' : ''; ?>">
            <label for="description">Description</label>
            <textarea class="form-control" name="description"><?php echo isset($description) ? $description : ''; ?></textarea>
            <?php if (isset($errors['description'])) : ?>
                <p class="validation-error">
                    <?php echo $errors['description'][0]; ?>
                </p>
            <?php endif; ?>
        </div>
        <div>
            <button class="btn" type="submit">Upload</button>
        </div>
    </form>
</div>
