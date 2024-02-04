<?php
session_start();
//
include "functions.php";
$Name=getUrlData($_REQUEST["p0"]);
$Text=getUrlData($_REQUEST["p1"]);
$Author=$_SESSION["Username"];
//accounts is existing
if(!file_exists("../database/forum/".$Name.".frm"))exit("0");
//create the user xml database
$Xml=simplexml_load_file("../database/forum/".$Name.".frm");
$Xml->Forum->addChild("Item",$Text);
$cnt=$Xml->Forum->Item->count();
$lc=$Xml->Forum->Item[$cnt-1];
//author
$lc->addAttribute("author",$Author);
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
echo "1";
?>