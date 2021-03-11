<?php require_once APP_ROOT . '/views/includes/header.php' ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create an Account</h2>
            <p>Please fill out this form to register with us</p>
            <form action="<?= URL_ROOT . '/users/register'  ?>" method="post">
                <div class="form-group">
                    <label for="user_type">User Type: <sup>*</sup></label>
                    <select name="category_id" id="user_type" class="custom-select <?= $data['category_id_err'] ? 'is-invalid' : ''; ?>">
                        <?php foreach ($data['categories'] as $category) : ?>
                            <option <?= $data['category_id'] == $category->id ? "selected" : '' ?> class="<?= $category->subcategory_id ? '' : 'font-weight-bold' ?>" value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="invalid-feedback"><?= $data['category_id_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="name" id="name" value="<?= $data['name'] ?>" class="form-control form-control-lg  <?= $data['name_err'] ? 'is-invalid' : '' ?>">
                    <span class="invalid-feedback"><?= $data['name_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" value="<?= $data['email'] ?>" class="form-control form-control-lg  <?= $data['email_err'] ? 'is-invalid' : '' ?>">
                    <span class="invalid-feedback"><?= $data['email_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" id="password" value="<?= $data['password'] ?>" class="form-control form-control-lg  <?= $data['password_err'] ? 'is-invalid' : '' ?>">
                    <span class="invalid-feedback"><?= $data['password_err'] ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" id="confirm_password" value="<?= $data['confirm_password'] ?>" class="form-control form-control-lg  <?= $data['confirm_password_err'] ? 'is-invalid' : '' ?>">
                    <span class="invalid-feedback"><?= $data['confirm_password_err'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URL_ROOT ?>/users/login" class="btn btn-light btn-block">
                            Have an account? Login
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APP_ROOT . '/views/includes/footer.php' ?>