<?php
session_start();
//
include "functions.php";
$Name=getUrlData($_REQUEST["p0"]);
$Subject=getUrlData($_REQUEST["p1"]);
$Author=$_SESSION["Username"];
//accounts is existing
if(file_exists("../database/forum/".$Name.".frm"))exit("0");
//create the user xml database
$Xml=simplexml_load_file("../database/forum/forum.xml");
$Xml->Subject=$Subject;
$Xml->Author=$Author;
//
$lc=$Xml->Date;
//timing
$lc->addAttribute("dw",date("l"));
$lc->addAttribute("d",date("d"));
$lc->addAttribute("m",date("m"));
$lc->addAttribute("y",date("Y"));
$lc->addAttribute("h",date("H"));
$lc->addAttribute("min",date("i"));
$lc->addAttribute("s",date("s"));
//
$Xml->SaveXml("../database/forum/".$Name.".frm");
//
$Xml=simplexml_load_file("../database/forum/forum.lst");
$Xml->addChild("Item",$Name);
$Xml->SaveXml("../database/forum/forum.lst");
//
echo "1";
?>