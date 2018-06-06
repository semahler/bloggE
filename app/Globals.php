<?php

/**
 * Defining the base-directories for the project
 */
define ('SERVER_ROOT_DIR', filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));
define ('APPLICATION_ROOT_DIR', ''); // e.g. '/blog'
define ('BASE_DIR', SERVER_ROOT_DIR . APPLICATION_ROOT_DIR . '/');
define ('APP_DIR', BASE_DIR . 'app/');
define ('CONTROLLER_DIR', APP_DIR . 'controller/');
define ('CORE_DIR', APP_DIR . 'core/');
define ('DATA_DIR', APP_DIR . 'data/');
define ('MODEL_DIR', APP_DIR . 'model/');
define ('VIEW_DIR', APP_DIR . 'view/');
define ('UPLOAD_DIR', DATA_DIR . 'uploads/');
define ('STATIC_DIR', SUB_DIR . '/static');

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

/**
 * Show php-errors and hide notices
 */
error_reporting(E_ALL & ~E_NOTICE);

/**
 * Defining navigation paths
 */
define ('NAV_PATH_HOME', APPLICATION_ROOT_DIR. '/');

define ('NAV_PATH_ADMIN_NEW_POST', APPLICATION_ROOT_DIR. '/admin/new-post');
define ('NAV_PATH_ADMIN_SELECT_POST', APPLICATION_ROOT_DIR . '/admin/select-post');
define ('NAV_PATH_ADMIN_EDIT_POST', APPLICATION_ROOT_DIR . '/admin/edit-post');
define ('NAV_PATH_ADMIN_DELETE_POST', APPLICATION_ROOT_DIR . '/admin/delete-post');
define ('NAV_PATH_ADMIN_SAVE_POST', APPLICATION_ROOT_DIR . '/admin/save-post');
define ('NAV_PATH_ADMIN_MANAGE_PICTURE', APPLICATION_ROOT_DIR . '/admin/manage-picture');
define ('NAV_PATH_ADMIN_SAVE_PICTURE', APPLICATION_ROOT_DIR . '/admin/save-picture');
define ('NAV_PATH_ADMIN_DELETE_PICTURE', APPLICATION_ROOT_DIR . '/admin/delete-picture');

define ('NAV_PATH_INDEX_PAGE', APPLICATION_ROOT_DIR . '/index/page');
define ('NAV_PATH_INDEX_READ', APPLICATION_ROOT_DIR . '/index/read');
define ('NAV_PATH_INDEX_SAVE_COMMENT', APPLICATION_ROOT_DIR . '/index/save-comment');



