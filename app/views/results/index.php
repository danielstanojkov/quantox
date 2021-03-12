<?php require_once APP_ROOT . '/views/includes/header.php' ?>

<div class="row mt-4">
    <div class="col-6">

        <div class="card bg-light p-4">
            <?php foreach ($data['categories'] as $category) : ?>

                <p class="font-weight-bold"><?= $category['category']->name ?><span class="badge badge-dark ml-2">12</span></p>

                <?php foreach ($category['subcategories'] as $subcategory) { ?>

                    <p class="pl-3"><?= $subcategory['category']->name ?><span class="badge badge-success ml-2">5</span></p>

                    <?php foreach ($subcategory['subcategories'] as $third_category) { ?>
                        <p class="pl-5"><?= $third_category->name ?><span class="badge badge-warning ml-2">5</span></p>
                    <?php } ?>
                <?php  } ?>
                
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-6">
        <p class="display-4 text-center mb-4">Users from search:</p>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Category</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($data['users'] as $user) : ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->categoryName ?></td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>

    </div>
</div>

<?php require_once APP_ROOT . '/views/includes/footer.php' ?>