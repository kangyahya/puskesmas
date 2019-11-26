<?php

// connect to db
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_puskesmas';
$connect = new mysqli($host, $user, $pass, $dbname);
//$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);

if (mysqli_connect_errno()) {

    echo "Failed to Connect to Mysql" . mysqli_connect_error();

}

?>