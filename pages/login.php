<?php if (!defined("APP_VERSION")) {
    exit;
} ?>
<?php

if (is_post()) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = $db->prepare("SELECT * FROM users WHERE email = ?");
    $sql->bind_param('s', $email);
    $sql->execute();

    $result = $sql->get_result();

    if ($user = $result->fetch_assoc()) {
        if (!password_verify($password, $user['password'])) {
            $errors[] = 'The given credentials dont match';
        }
    } else {
        $errors[] = 'The given credentials dont match';
    }

    if (count($errors) == 0) {
        log_in_user($user['id']);
        redirect('home');
    }
}
?>

<?php include_once './views/_header.php'; ?>
<div class="page page-login">
    <form class="card login-form" action="<?= page_url('login') ?>" method="POST">
        <?php if (count($errors)) : ?>
            <div class="alert alert-error">
                <?php foreach ($errors as $error) : ?>
                    <p><?= $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="form-group<?php echo isset($errors['email']) ? ' has-error' : ''; ?>">
            <label for="email">Email address</label>
            <input class="form-control" type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
            <?php if (isset($errors['email'])) : ?>
                <p class="validation-error">
                    <?php echo $errors['email'][0]; ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo isset($errors['password']) ? ' has-error' : ''; ?>">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" value="">
            <?php if (isset($errors['password'])) : ?>
                <p class="validation-error">
                    <?php echo $errors['password'][0]; ?>
                </p>
            <?php endif; ?>
        </div>
        <div>
            <button class="btn" type="submit">Sign in</button>
        </div>
    </form>

</div>
<?php include_once './views/_footer.php'; ?>
