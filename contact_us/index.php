<?php
//Start session for getting and managing user connection
session_start();
?>
<html encoding="UTF-8" lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Département ITER</title>
	<script src="../jquery.js"></script>
	<script src="../common/functions.js"></script>
	<link rel="icon" href="../icon.png" type="image/png">
	<link rel="stylesheet" href="../common/styles.css"/>
	<link rel="stylesheet" href="styles.css"/>
	
	<meta name="viewport" content="width=device-width;initial-scale=1.0">
	<meta charset="UTF-8">
	<meta name="description" content="I.T.E.R">
	<meta name="keywords" content="School,High,Space,Study,Student,Teacher,Diplome">
	<meta name="author" content="Global Sky">
</head>

<body>
	<div id="Preloader"></div>
	<div id="TopBanner"></div>
	
	
	<div id="ContactBanner">
		<a class="Slash">[</a>
		<a class="Title">CONTACTS</a>
		<a class="Slash">]</a>
		<div id="ContactError" >ERREUR: Veuillez remplir correctement les champs !</div>
		<div id="ContactState" >SUCCES: Le message a été envoyé !</div>
		<input id="ContactName" type="text" placeholder="TON NOM"/>
		<input id="ContactEmail" type="email" placeholder="TON EMAIL"/>
		<textArea id="ContactText" placeholder="TON MESSAGE" rows="2"></textarea>
		<span id="ContactSendBtn" class="Btn">ENVOYER</span>
	</div>
	
	<div id="ContactInfos">
		<?php
		//Load All events of artist from Events.xml
		$xml=simplexml_load_file("../lib/Contacts.xml");
		//
		echo "<div>";
			echo "<img src='../lib/map.png'/>";
			echo "<b>OFFICE</b>";
			echo "<a href='".$xml->googleMap."' target='_blank'>".$xml->googleMap["place"]."</a>";
		echo "</div>";
		echo "<div>";
			echo "<img src='../lib/email.png'/>";
			echo "<b>E-MAIL</b>";
			echo "<a href='mailto:".$xml->email."'>".$xml->email."</a>";
		echo "</div>";
		echo "<div>";
			echo "<img src='../lib/phone.png'/>";
			echo "<b>PHONE</b>";
			echo "<a href='tel:".$xml->contact."'>".$xml->contact["number"]."</a>";
		echo "</div>";
		?>
	</div>
	
	
	<div id="BottomBanner"></div>
	
	<script src="../common/scripts.js"></script>
	<script src="scripts.js"></script>
</body>
</html>