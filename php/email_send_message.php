<?php
ini_set("SMTP","smtp.gmail.com");
ini_set("smtp_port","587");
ini_set("sendmail_from","ouyaolivier@gmail.com");
ini_set("sendmail_path","\"C:\xampp\sendmail\sendmail.exe\" -t");
//
$name=$_REQUEST["p1"];
$email=$_REQUEST["p2"];
$message=$_REQUEST["p3"];
//
$subject="Auteur: ".$name;
$headers="From: ".$email;
if(mail("ouyaolivier@gmail.com",$subject,$message,$headers))echo 1;
else echo 0;
?>