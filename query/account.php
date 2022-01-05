<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
NOW WE INSERTING OUR SALES TRANSACTION TO DATABASE ON FATORA TABLE 
USING AJAX 
FIRST FUNCTION(add on sales table )

SECAND FUNCTION (find client name to show )
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
include "../conect.php";
include "../function.php";


if($_SERVER['REQUEST_METHOD']=="POST"){
    
$serial =$_POST['serial'];
    // $product =$_POST['product'];
    // $price =$_POST['price'];
    // $qty =$_POST['qty'];
    // $total =$_POST['total'];
    $client =$_POST['client'];
    $date =$_POST['date'];
    insertfatora($serial,$client,$date);


        
    }

    clientname($client);