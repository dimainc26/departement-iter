<?php
/*--_-------------------------------
Made by ouya jean marc olivier alias wane marao @AoFusionDevs
-----------------------------------*/
include "functions.php";
//
session_start();
//
$_SESSION["Username"]=getUrlData($_REQUEST["p1"]);
$_SESSION["UserPassword"]=getUrlData($_REQUEST["p2"]);
echo "1";
?>