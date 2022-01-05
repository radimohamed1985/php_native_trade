<?php

/*
NOW WE INSERTING OUR SALES TRANSACTION TO DATABASE THEN UPDATING OUR STORE QTY ON SAME TIME 
USING AJAX 
FIRST FUNCTION(add on sales table )
SECAND FUNCTION (update on product table )
*/
include "../conect.php";
include "../function.php";


if($_SERVER['REQUEST_METHOD']=="POST"){
    
$serial =$_POST['serial'];
    $product =$_POST['product'];
    $price =$_POST['price'];
    $qty =$_POST['qty'];
    $cost=$_POST['cost'];
    $total =$_POST['total'];
    $client =$_POST['client'];
    $date =$_POST['date'];
    if($qty<=$_POST['sqty']){
        sales($serial,$product,$price,$qty,$cost,$total,$client,$date);
        updateqty($product,$qty);
        
    }
    else{
        return "the quantaty is more than store ";
    }
   
}

