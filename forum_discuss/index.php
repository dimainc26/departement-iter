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
			<input id="SearchInput" type="search" placeholder="Recherche"/>
			<img id="SearchBtn" class="Btn" src="../lib/search.png"/>
		</form>
		<div id="ForumCreateBtn"><img id="ForumCreateIcon" src="../lib/forum.png"/>Créer un sujet de discussions<a id="ForumCreateMinus">+</a></div>
		<form id="ForumCreateForm" onsubmit="return createTopic();">
			<input id="ForumCreateName" class="ForumInput" type="text" maxlength="24" placeholder="Name"/>
			<input id="ForumCreateSubject" class="ForumInput" type="text" maxlength="64" placeholder="Sujet"/>
			<input id="ForumCreateValidateBtn" class="ForumValidateBtn Btn" type="submit" value="Créer le sujet"/>
		</form>
	</div>
	
	
	<div id="ForumList">
		<div id="ForumListTitle">
			<?php 
			if(empty($_REQUEST["p"])){
				echo "Aucun sujet de discussion selectionné";
			}
			else{
				echo $_REQUEST["p"];
			}
			?>
		</div>
		<div id="ForumListBody">
		<?php
		if(empty($_REQUEST["p"])){
			
		}
		else{
			$Xml=simplexml_load_file("../database/forum/".$_REQUEST["p"].".frm");
			$cnt=$Xml->Forum->Item->count();
			for($i=0;$i<$cnt;$i++){
				createForm($Xml->Forum->Item[$i]);
			}
		}
		?>	
		</div>
	</div>
	
	<div id="DiscussPost">
		<?php
		if(empty($_REQUEST["p"])){
			
		}
		else{
			echo "<div id='DiscussPostUser'>";
				echo "<img src='../lib/avatar.png'/>";
				echo "<a>domainname</a>";
			echo "</div>";
			echo "<textarea id='DiscussInput' rows='5' placeholder='Ecrivez quelques choses à poster...'></textarea>";
			echo "<center>";
				echo "<span id='DiscussPostBtn' class='Btn'>Poster</span>";
			echo "</center>";
		}
		?>
	</div>
	
	
	
	<div id="BottomBanner"></div>
	
	<script src="../common/scripts.js"></script>
	<script src="scripts.js"></script>
</body>
</html>