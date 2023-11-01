<?php
    //Database configuration
    define('DB_HOST', 'localhost' );
    define('DB_USER', 'root');
    define('DB_PASSWORD','');
    define('DB_NAME','ecotrade_db');

    // APPROOT
    define('APPROOT',dirname(dirname(__FILE__)));
    
    // URLROOT
    define('URLROOT','http://localhost/ecotrade');

    //WEBSITE NAME
    define('SITENAME', 'Ecotrade');

    //PUBROOT
    define('PUBROOT', dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'public');
?>