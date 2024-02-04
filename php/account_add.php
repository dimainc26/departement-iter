<?php
include "functions.php";
$Name=getUrlData($_REQUEST["p0"]);
$Password=getUrlData($_REQUEST["p1"]);
$Email=getUrlData($_REQUEST["p2"]);
$Contact=getUrlData($_REQUEST["p3"]);
$Image=getUrlData($_REQUEST["p4"]);
//accounts is existing
if(file_exists("../accounts/".$Name.".usr"))exit("0");
//create the user xml database
$Xml=simplexml_load_file("../accounts/account.xml");
$Xml->Password=$Password;
$Xml->Email=$Email;
$Xml->Contact=$Contact;
$Xml->Image=$Image;
//
$Xml->SaveXml("../accounts/".$Name.".usr");
echo "1";
?>