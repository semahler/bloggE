<?php

spl_autoload_register(function($className) {

    // Defining an array of all include-directories
    $modules = [APP_DIR, CORE_DIR, CONTROLLER_DIR, MODEL_DIR, VIEW_DIR];

    //Loop through each directory to find the requested class
    foreach( $modules as $module ) {
        if (file_exists($module . ucfirst($className) . '.php')) {

            require_once($module . ucfirst($className) . '.php');

            return;
        }
    }

});