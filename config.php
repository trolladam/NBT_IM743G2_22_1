<?php if (!defined("APP_VERSION")) {
    exit;
} ?>
<?php

define('BASE_URL', 'http://localhost:8888/demo/');
define('BASE_PATH', __DIR__);

define('DEBUG', true);

/**
 * DATABASE SETTINGS
 */

define('DB_HOST', '127.0.0.1:8889');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'demo');


define('PAGE_LIMIT', 8);

define('MAX_UPLOAD_SIZE', 10);
