<?php
/**
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * show the selected invoice from database and show on page of adding invoicing before printing
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * 
 */
include "../conect.php";
include "../function.php";

$idd = $_GET['q'];





getinvoice($idd);

