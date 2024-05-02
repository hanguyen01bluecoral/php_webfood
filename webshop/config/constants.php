<?php
    session_start();


    //create constants to store 
    define('SITEURL','http://localhost:81/php/webshop/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','food_oders');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, ) ;
    $db_select = mysqli_select_db($conn, DB_NAME) ;

?>