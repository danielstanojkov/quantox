<?php require_once APP_ROOT . '/views/includes/header.php' ?>


<div class="row mt-3">
    <div class="col-6">
        <?= flash('login_success'); ?>
        <h2 class="my-4">Search for Users</h2>
        <form>
            <div class="form-group">
                <input placeholder="Search for user name" type="text" class="form-control form-control-lg" id="name" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="user_type">User Type</label>
                <select name="user_type" id="user_type" class="custom-select">
                    <option value="front-end-developer">Front End Developer</option>
                    <option value="back-end-developer">Back End Developer</option>
                </select>
            </div>
            <button type="submit" class="btn btn-block btn-success">Search</button>
        </form>

    </div>
</div>


<?php require_once APP_ROOT . '/views/includes/footer.php' ?>