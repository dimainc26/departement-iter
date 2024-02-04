<?php
/*--_-------------------------------
Made by ouya jean marc olivier alias wane marao @AoFusionDevs
-----------------------------------*/
include "functions.php";
//
$file="../".getUrlData($_REQUEST["p1"]);
$xPath=getUrlData($_REQUEST["p2"]);
if(!file_exists($file))exit("");
$Xml=simplexml_load_file($file);
echo $Xml->xpath($xPath)[0];
?>