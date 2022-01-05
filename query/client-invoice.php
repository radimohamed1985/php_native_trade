<?php

/**++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * now get all invoices from fatora table with the total of each fatora and serial 
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */ 
include "../conect.php";
include "../function.php";




$date=$_GET['q'];


clientinvoice($date);