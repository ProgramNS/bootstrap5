<?php
function getConnection (): PDO {
    $host = "localhost";
    $port = 3306;
    $database = "Topi_Second";
    $username = "root";
    $password = "";

    return $connection = new PDO ("mysql:host=$host:$port;dbname=Topi_Second",$username,$password);
}
?>