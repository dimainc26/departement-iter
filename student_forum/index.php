<?php
//Start session for getting and managing user connection
session_start();
include "form.php";
?>
<html encoding="UTF-8" lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Département ITER</title>
	<script src="../jquery.js"></script>
	<script src="../common/functions.js"></script>
	<link rel="icon" href="../icon.png" type="image/png">
	<link rel="stylesheet" href="styles.css"/>
	<link rel="stylesheet" href="../common/styles.css"/>
	
	<meta name="viewport" content="width=device-width;initial-scale=1.0">
	<meta charset="UTF-8">
	<meta name="description" content="I.T.E.R">
	<meta name="keywords" content="School,High,Space,Study,Student,Teacher,Diplome">
	<meta name="author" content="Global Sky">
</head>

<body>
	<div id="Preloader"></div>
	<div id="TopBanner"></div>
	
	<div id="TitleBanner">
		<center>
			<a class="Title">Forum étudiant</a>
		</center>
	</div>
	
	<div id="ForumBox">
		<form id="SearchBar" onsubmit="return doSearch();">
			<center>
				<input id="SearchInput" type="search" placeholder="Recherche"/>
				<img id="SearchBtn" class="Btn" src="../lib/search.png"/>
			</center>
		</form>
		<div id="ForumCreateBtn"><img id="ForumCreateIcon" src="../lib/forum.png"/>Créer un sujet de discussions<a id="ForumCreateMinus">+</a></div>
		<form id="ForumCreateForm" onsubmit="return createTopic();">
			<input id="ForumCreateName" class="ForumInput" type="text" maxlength="24" placeholder="Name"/>
			<input id="ForumCreateSubject" class="ForumInput" type="text" maxlength="64" placeholder="Sujet"/>
			<input id="ForumCreateValidateBtn" class="ForumValidateBtn Btn" type="submit" value="Créer le sujet"/>
		</form>
	</div>
	
	
	<div id="ForumList">
		<div id="ForumListTitle">Sujets de discussions</div>
		<div id="ForumListBody">
		<?php
		$Xml=simplexml_load_file("../database/forum/forum.lst");
		$cnt=$Xml->Item->count();
		//
		if(empty($_REQUEST["p"])){
			for($i=$cnt-1;$i>=0 && $i+1-$cnt>-10;$i--){
				$Name=$Xml->Item[$i];
				$Xml2=simplexml_load_file("../database/forum/".$Name.".frm");
				createForm($Name,$Xml2);
			}
		}
		else{
			$search=$_REQUEST["p"];
			for($i=$cnt-1;$i>=0;$i--){
				$Name=$Xml->Item[$i];
				$Xml2=simplexml_load_file("../database/forum/".$Name.".frm");
				$Subj=" ".$Xml2->Subject." ".$Name;
				$data=explode(" ",$search);
				$ok=false;
				//
				for($j=0;$j<count($data);$j++){
					if(stripos($Subj,$data[$j],0)!=false){
						$ok=true;
						break;
					}
				}
				//
				if($ok)createForm($Name,$Xml2);
			}
		}
		?>	
		</div>
	</div>
	
	<div id="BottomBanner"></div>
	
	<script src="../common/scripts.js"></script>
	<script src="scripts.js"></script>
</body>
</html>