<?php
include_once 'config.php';
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/Route.php';
spl_autoload_register(function ($trait_name) {
    $traitFileName = '../application/core/traits/' . $trait_name . '.php';
    if (file_exists($traitFileName)) {
        include_once $traitFileName;
    }
});

Route::start();
