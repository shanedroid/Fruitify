<?php
/**
 * Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

/*PROJECT URL/HOST*/
### LOCAL DEV == "127.0.0.1" or "localhost" (plus sub-folder) ###
if ($_SERVER['SERVER_NAME'] == 'localhost' || '127.0.0.1') {

    if (!defined('URL')) {
        define('URL', '');
    }

    if (!defined('DB_TYPE')) {
        define('DB_TYPE', '');
    }

    if (!defined('DB_HOST')) {
        define('DB_HOST', '');
    }

    if (!defined('DB_NAME')) {
        define('DB_NAME', '');
    }

    if (!defined('DB_USER')) {
        define('DB_USER', '');
    }

    if (!defined('DB_PASS')) {
        define('DB_PASS', '');
    }
} else { ### HOSTED ==  ###

    if (!defined('URL')) {
        define('URL', '');
    }

    if (!defined('DB_TYPE')) {
        define('DB_TYPE', '');
    }

    if (!defined('DB_HOST')) {
        define('DB_HOST', '');
    }
    if (!defined('DB_NAME')) {
        define('DB_NAME', '');
    }
    if (!defined('DB_USER')) {
        define('DB_USER', '');
    }
    if (!defined('DB_PASS')) {
        define('DB_PASS', '');
    }
}


//DIRS & PATHS
define('TMP_DIR', '../../TmpFiles/');
$upload_dir = TMP_DIR;

//autoload every OOP Class in directory
spl_autoload_register(function ($class) {require_once 'app/libs/Classes/'.$class.'.class.php';} );

if (!isset($_SESSION)) {
    session_start();
}
