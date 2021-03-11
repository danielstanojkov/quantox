<?php

// Load Config
require_once 'config/config.php';

// Autoloader for our classes
spl_autoload_register(function ($className) {
    $classes = explode('\\', $className);
    require_once "vendor/" . array_pop($classes) . ".php";
});

