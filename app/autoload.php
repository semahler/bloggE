<?php

$modules = [BASE_DIR, APP_DIR, CONTROLLER_DIR, CORE_DIR, MODEL_DIR, VIEW_DIR];

set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
spl_autoload_register('spl_autoload', false);

