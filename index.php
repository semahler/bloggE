<?php

require_once(__DIR__ . '/app/Globals.php');


function autoload($className) {
    require_once CORE_DIR . $className . '.php';
}

spl_autoload_register('autoload');

$application = new Application();
$application->run();

