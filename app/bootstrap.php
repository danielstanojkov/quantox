<?php

use App\Vendor\Core;

// Load Config
require_once 'config/config.php';

// Load Helper Functions
require_once 'helpers/helpers.php';

// Autoloader for our classes
spl_autoload_register(function ($className) {
    $classes = explode('\\', $className);
    require_once "vendor/" . array_pop($classes) . ".php";
});

// Instantiate new Core class
$init = new Core;
