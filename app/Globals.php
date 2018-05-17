<?php

/**
 * Defining the base-directories for the project
 */
define ( 'BASE_DIR', filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/' );
define ('APP_DIR', BASE_DIR . 'app/');
define ('CONTROLLER_DIR', APP_DIR . 'controller/');
define ('CORE_DIR', APP_DIR . 'core/');
define ('DATA_DIR', APP_DIR . 'data/');
define ('MODEL_DIR', APP_DIR . 'model/');
define ('VIEW_DIR', APP_DIR . 'view/');

define ('PAGE_HEAD_TEMPLATE_PATH', VIEW_DIR . 'default/header.php');
define ('PAGE_FOOT_TEMPLATE_PATH', VIEW_DIR . 'default/footer.php');

