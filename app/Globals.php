<?php

/**
 * Defining the base-directories for the project
 */
define ('SUB_DIR', ''); // e.g. /blog or /~s75927
define ('APP_DIR',  'app/');
define ('CONTROLLER_DIR', APP_DIR . 'controller/');
define ('CORE_DIR', APP_DIR . 'core/');
define ('DATA_DIR', APP_DIR . 'data/');
define ('MODEL_DIR', APP_DIR . 'model/');
define ('VIEW_DIR', APP_DIR . 'view/');
define ('UPLOAD_DIR', DATA_DIR . 'uploads/');
define ('STATIC_DIR', 'static/');

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
define ('PICTURE_UPLOAD_MAX_FILESIZE', 2048); // unit: kbyte
define ('PICTURE_UPLOAD_FILETYPES', ['image/jpeg', 'image/png', 'image/gif']);

/**
 * Show php-errors and hide notices
 */
error_reporting(E_ALL & ~E_NOTICE);

/**
 * Defining navigation paths
 */
define ('NAV_PATH_HOME', '/');

define ('NAV_PATH_ADMIN_NEW_POST', 'admin/new-post/');
define ('NAV_PATH_ADMIN_SELECT_POST', 'admin/select-post/');
define ('NAV_PATH_ADMIN_EDIT_POST', 'admin/edit-post/');
define ('NAV_PATH_ADMIN_DELETE_POST', 'admin/delete-post/');
define ('NAV_PATH_ADMIN_SAVE_POST', 'admin/save-post/');
define ('NAV_PATH_ADMIN_MANAGE_PICTURE', 'admin/manage-picture/');
define ('NAV_PATH_ADMIN_SAVE_PICTURE', 'admin/save-picture/');
define ('NAV_PATH_ADMIN_DELETE_PICTURE', 'admin/delete-picture/');

define ('NAV_PATH_INDEX_PAGE', 'index/page/');
define ('NAV_PATH_INDEX_READ', 'index/read/');
define ('NAV_PATH_INDEX_SAVE_COMMENT', 'index/save-comment/');



