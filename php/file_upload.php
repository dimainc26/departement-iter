<?php
include "functions.php";
if(!isset($_FILES["p1"]) || !isset($_REQUEST["p2"]))exit("");
$f=$_FILES["p1"];
$t=$_REQUEST["p2"];
echo fileUpload($f,$t);
?>