<?php
    // definisikan variabel konstanta dengan define
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','db_todo');

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if(!$connection){
        die("failed to connect to database".mysqli_error($connection));
    }