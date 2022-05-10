<form class="card album-form" action="<?= $action_url; ?>" method="POST">
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
        <button class="btn" type="submit">Save</button>
    </div>
</form>
