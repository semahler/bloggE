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
define ('UPLOAD_DIR', DATA_DIR . 'uploads/');

define ('PAGE_HEAD_TEMPLATE_PATH', VIEW_DIR . 'default/header.php');
define ('PAGE_FOOT_TEMPLATE_PATH', VIEW_DIR . 'default/footer.php');

/**
 * Defining some configuration values
 */
define ('POSTS_PER_PAGE', 3);
define ('NUMBER_OF_LATEST_POSTS', 10);
define ('FILENAME_POST', 'post.json');
define ('FILENAME_COMMENTS', 'comments.json');
define ('DEFAULT_TITLE', 'bloggE - Blogging Platform');
define ('TEXT_PREVIEW_LENGTH', 400);

