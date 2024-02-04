<?php
/*--_-------------------------------
Made by ouya jean marc olivier alias wane marao @AoFusionDevs
-----------------------------------*/
session_start();
if(empty($_SESSION["Username"]) || empty($_SESSION["UserPassword"]))exit("0");
echo "1";
?>