<?php
include "../conect.php";
include "../function.php";

$serial = $_GET['q'];
getsales($serial);


getsalestotal($serial);

include "../footer.php";