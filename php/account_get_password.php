<?php
include "functions.php";
//
$Name=getUrlData($_REQUEST["p"]);
//check user data
if(!file_exists("../accounts/".$Name.".usr"))exit("");
$Xml=simplexml_load_file("../accounts/".$Name.".usr");
echo $Xml->Password;
?>