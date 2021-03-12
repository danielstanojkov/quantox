<?php require_once APP_ROOT . '/views/includes/header.php' ?>

<div class="row mt-3">
    <div class="col-6">
        <?= flash('login_success'); ?>
        <h2 class="my-4">Search for Users</h2>
        <form method="POST" action="<?= URL_ROOT . '/results/search'  ?>">
            <div class="form-group">
                <input name="search" value="<?= $data['search'] ?>" placeholder="Search for user" type="text" class="form-control form-control-lg <?= $data['search_err'] ? 'is-invalid' : '' ?>" id="name" aria-describedby="emailHelp">
                <span class="invalid-feedback"><?= $data['search_err'] ?></span>
            </div>

            <div class="form-group">
                <label for="user_type">User Type</label>
                <select name="user_type" id="user_type" class="custom-select <?= $data['type_err'] ? 'is-invalid' : '' ?> ">
                    <option <?= $data['type'] == 'front' ? 'selected' : '' ?> value="front">Front End Developer</option>
                    <option <?= $data['type'] == 'back' ? 'selected' : '' ?> value="back">Back End Developer</option>
                </select>
                <span class="invalid-feedback"><?= $data['type_err'] ?></span>
            </div>
            <button type="submit" class="btn btn-block btn-success">Search</button>
        </form>

    </div>
</div>

<?php require_once APP_ROOT . '/views/includes/footer.php' ?>