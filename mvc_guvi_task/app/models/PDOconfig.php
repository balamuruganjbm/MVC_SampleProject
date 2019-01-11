<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'sampleproject';

    //SETTING UP DSN
    $dsn = 'mysql:host='.$host.';dbname='.$dbname;

    //CREATING PDO INSTANCE
    $pdo = new PDO ($dsn,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>