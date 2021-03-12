<?php require_once APP_ROOT . '/views/includes/header.php' ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">

            <?php flash('register_success'); ?>
            <?php flash('status'); ?>
        
            <h2>Login</h2>
            <p>Please fill in your credentials to login</p>
            <form action="<?= URL_ROOT . '/users/login'  ?>" method="post">
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" value="<?= $data['email'] ?>" class="form-control form-control-lg  <?= $data['email_err'] ? 'is-invalid': '' ?>">
                    <span class="invalid-feedback"><?= $data['email_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" id="password" value="<?= $data['password'] ?>" class="form-control form-control-lg  <?= $data['password_err'] ? 'is-invalid': '' ?>">
                    <span class="invalid-feedback"><?= $data['password_err'] ?></span>
                </div>
        
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URL_ROOT ?>/users/register" class="btn btn-light btn-block">
                             No account? Register
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APP_ROOT . '/views/includes/footer.php' ?>