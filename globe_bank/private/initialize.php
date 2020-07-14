<?php
    ob_start();     // output buffering is turned on.

    // Assign file paths to PHP constants
    // __FILE__ returns the current path to this file
    // dirname() returns the path to the parent directory
    
    define("PRIVATE_PATH", dirname(__FILE__));              // links to the private folder location
    // echo PRIVATE_PATH."<br/>";

    define("PROJECT_PATH", dirname(PRIVATE_PATH));          // links to the globe_bank folder location
    // echo PROJECT_PATH."<br/>";

    define("PUBLIC_PATH", PROJECT_PATH . '/public');        // links to the public folder location
    // echo PUBLIC_PATH."<br/>";

    define("SHARED_PATH", PRIVATE_PATH . '/shared');        // links to the shared folder location
    // echo SHARED_PATH."<br/>";

    // Assign the root(which is like this http://localhost:85/PHP-with-MySQL-Course/globe_bank/public/) URL to a PHP constant
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    // echo $public_end."<br/>";

    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $doc_root);
    // echo WWW_ROOT ."<br/>";                              ///PHP-with-MySQL-Course/globe_bank/public

    require_once('functions.php');
    // calls the functions.php file which is available with in the same folder, 
    // therefore the functions can be used within the php file when created.

    // we call the database.php file
    require_once('database.php');

    // we will be using the variable $db to work with queries (remember it returns the $connection to work with)
    $db = db_connect();

?>