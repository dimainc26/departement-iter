<?php
//
date_default_timezone_set("UTC");
//function getUrlData
function getUrlData($v){
	//exist and not empty
	if(!isset($v) && empty($v))exit("0");
	//remove whitespace
	$v=trim($v);
	//if it is an numeric value and not contact
	if(is_numeric($v) && $v[0]!="0")$v=$v+0;
	//if is not numeric
	return $v;
}

//function getUrlData
function getNumericData($v){
	//don't exist or empty
	if(!isset($v) && empty($v))exit("");
	//if it is an numeric value and not contact
	if(is_numeric($v) && $v[0]=="0")$v=$v+0;
	return $v;
}

//function to get a number format
function _getNumberFormat($n,$cc,$f){
	$r;
	$p=(substr($n,0,1)=="+"?1:2)+strlen($cc);
	//
	if($f=="best_view"){
		$r="+".$cc." ".substr($n,$p,2)." ".substr($n,$p+2,2)." ".substr($n,$p+4,2)." ".substr($n,$p+6,2);
		return $r;
	}
	//
	$p+=strlen($cc);
	
	return "+".$cc.substr($n,$p,8);
}

//function to get a number format
function _getNumber($c){
	return "+".substr($c,2,strlen($c)-2);
}

//fileUpload
function fileUpload($f,$folder){
	$dir="../media/".$folder."/".date("Ym");
	if(!file_exists($dir))mkdir($dir);
	$dir=$dir."/";
	$ext=pathinfo($f["name"],PATHINFO_EXTENSION);
	$path=$dir.date("dHis.").$ext;
	//check if file exist
	if(file_exists($path))return "";
	if(move_uploaded_file($f["tmp_name"],$path)){
		return substr($path,3,strlen($path)-3);
	}
	return "";
}

//AudioUpload
function audioUpload($f){
	$dir="../media/voices/".date("Ym");
	if(!file_exists($dir))mkdir($dir);
	$dir=$dir."/";
	$ext=pathinfo($f["name"],PATHINFO_EXTENSION);
	$path=$dir.date("dHis.").$ext;
	//check if file exist
	if(file_exists($path))return "";
	if(move_uploaded_file($f["tmp_name"],$path)){
		return substr($path,3,strlen($path)-3);
	}
	return "";
}


//parserGetCount
function parserGetCount($text,$parser){
	if($text=="")return 0;
	if($parser=="")return 1;
	$text="\0".$text;
	$count=0;
	for($a=0;$a<strlen($text);$a++){
		$a=strpos($text,$parser,$a);
		if($a<1 || $a==null){
			$count++;
			break;
		}
		if($a<strlen($text)){
			$count++;
		}
	}
	return $count;
}

//parserGetStart
function parserGetStart($text,$parser,$id){
	if($id<0 || $id>=parserGetCount($text,$parser))return 0;
	$cur=0;
	$text="\0".$text;
	$a=1;
	for(;$a<strlen($text) && $cur<$id;$a++){
		$a=strpos($text,$parser,$a);
		if($a<1 || $a==null)break;
		$cur++;
	}
	return $a-1;
}

//parserGetEnd
function parserGetEnd($text,$parser,$id){
	if($id<0 || $id>=parserGetCount($text,$parser))return 0;
	$cur=-1;
	$text="\0".$text;
	$a=1;
	for(;$a<strlen($text) && $cur<$id;$a++){
		$a=strpos($text,$parser,$a);
		if($a<1 || $a==null){
			return strlen($text);
		}
		$cur++;
	}	
	return $a-2;
}

//parserGetItem
function parserGetItem($text,$parser,$id){
	if($text=="")return "";
	if($id<0 || $id>=parserGetCount($text,$parser))return "";
	$a=parserGetStart($text,$parser,$id);
	$b=parserGetEnd($text,$parser,$id);
	return substr($text,$a,$b-$a);
}

function receiveLocalTime($di,$y,$m,$d,$h,$i,$s,$l){
	$dh=floor($di/60);$di=$di-$dh*60;
	//
	$h-=$dh;
	$i-=$di;
	if($i<0){$i=60+$i;$h--;}
	if($i>=59){$i-=60;$h++;}
	if($h<0){$h=24+$h;$d--;}
	if($h>24){$h-=24;$d++;}
	if($d<0){$d=31+$d;$m--;$l--;}
	if($d>31){$d-=31;$m++;$l++;}
	if($l<0)$l=7;
	if($l>7)$l=1;
	if($m<0){$m=12+$m;$y--;}
	if($m>12){$m-=12;$y++;}
	//
	$t;$t["y"]=$y;
	$t["m"]=t_val($m);
	$t["d"]=t_val($d);
	$t["h"]=t_val($h);
	$t["i"]=t_val($i);
	$t["s"]=t_val($s);
	$t["l"]=$l;
	return $t;
}

function t_val($t){
	$t=$t-0;
	return $t>9 ? $t:("0".$t);
}

//file functions
function fileRead($p){
	$f=fopen($p,"r");
	$t=fread($f,filesize($p));
	fclose($f);
	return $t;
}

function file_getExtension($p){
	$n=strrpos($p,".");
	if($n>=1){
		$p=substr($p,$n+1,strlen($p)-$n-1);
		return strtolower($p);
	}
	return "";
}

function file_getName($p){
	$n=strrpos($p,".");
	$i=strrpos($p,"/");
	if($i>=1)$i++;
	else $i=0;
	if($n>=1);
	else $n=strlen($p);
	return substr($p,$i,$n-$i);
}

function file_getFullName($p){
	if(file_getExtension($p)=="")return file_getName($p);
	return file_getName($p).".".file_getExtension($p);
}
?>