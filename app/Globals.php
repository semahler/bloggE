<?php

/**
 * Defining the base-directories for the project
 */
define( 'BASE_DIR', filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/' );
define ('APP_DIR', BASE_DIR . 'app/');
define ('VIEW_DIR', APP_DIR . 'view/');
define ('MODEL_DIR', APP_DIR . 'model/');
define ('CONTROLLER_DIR', APP_DIR . 'controller/');
define ('DATA_DIR', APP_DIR . 'data/');
define ('CORE_DIR', APP_DIR . 'core/');

/**
 * Array to store all valid routes
 */

$routes = [];
