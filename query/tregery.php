<?php
/**+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * get tregery
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 */
include "../conect.php";
include "../function.php";


$idd = $_GET['q'];
get_tregery($idd);