<?php

$dsn ="mysql:host=localhost;dbname=trade";
$user='root';
try{
    $con= new PDO($dsn,$user);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
    $e->getMessage();
}