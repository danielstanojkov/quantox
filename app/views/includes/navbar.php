<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= URL_ROOT ?>">
            <img height="60" src="<?= URL_ROOT ?>/images/quantox.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link mr-2" href="<?= URL_ROOT ?>">Home</a>
                </li>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="<?= URL_ROOT ?>/results">Results</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://quantox.com/">About Us</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL_ROOT ?>/users/logout">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item mr-3">
                        <a href="<?= URL_ROOT ?>/users/login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= URL_ROOT ?>/users/register" class="nav-link">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>