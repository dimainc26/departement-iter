<?php
include "functions.php";
//
$Name=getUrlData($_REQUEST["p"]);
//check number
if(file_exists("../accounts/".$Name.".usr"))echo "1";
else echo "0";
?>