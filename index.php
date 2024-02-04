<?php
//Start session for getting and managing user connection
session_start();
?>
<html encoding="UTF-8" lang="fr-FR" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Département ITER</title>
	<script src="jquery.js"></script>
	<script src="common/functions.js"></script>
	<link rel="icon" href="icon.png" type="image/png">
	<link rel="stylesheet" href="styles.css"/>
	<link rel="stylesheet" href="common/styles.css"/>
	
	<meta name="viewport" content="width=device-width;initial-scale=1.0">
	<meta charset="UTF-8">
	<meta name="description" content="I.T.E.R">
	<meta name="keywords" content="School,High,Space,Study,Student,Teacher,Diplome">
	<meta name="author" content="Global Sky">
</head>

<body>
	<div id="Preloader">
		<img id="PreloaderImg" src="lib/loader.gif"/>
	</div>
	
	<div id="TopBanner">
		<div id="TopBar">
			<div id="Hostname" class="TopBarItem">
				<img src="lib/avatar.png"/>
				<a>domainname</a>
			</div>
			<div id="SocialBtns" class="TopBarItem">
				<a href="#"><img src="lib/social_email.png"/></a>
				<a href="#"><img src="lib/social_facebook.png"/></a>
				<a href="#"><img src="lib/social_instagram.png"/></a>
				<a href="#"><img src="lib/social_youtube.png"/></a>	
			</div>
			<div id="SchoolCallNumber" class="TopBarItem">Tél: (+225) 08-02-33-21</div>
		</div>
		
		<div id="MenuBar">
			<div id="AccountBar">
				<div id="LoginBtn" class="AccountBtn Btn">Se connecter
					<div id="LoginBox" class="AccountDropdown">
						<form class="LoginBar" onsubmit="return LoginValidate();">
							<span></span>
							<input id="LoginName" class="LoginBarInput" type="text" placeholder="Nom d'utilisateur"/>
							<input id="LoginPassword" class="LoginBarInput" type="password" placeholder="Mot de passe"/>
							<input id="LoginValidateBtn" class="LoginBarValidateBtn Btn" type="submit" value="Se Connecter"/>
						</form>
					</div>
				</div>
				<div id="SignupBtn" class="AccountBtn Btn">Créer un compte
					<div class="AccountDropdown">
						<form id="SignupForm" class="LoginBar" onsubmit="return SignupValidate();">
							<span></span>
							<input id="SignupFile" type="file" accept="image/*"/>
							<img id="SignupAvatar" src="lib/Avatar.png"/>
							<input id="SignupName" class="LoginBarInput" type="text" placeholder="Nom d'utilisateur"/>
							<input id="SignupPassword" class="LoginBarInput" type="password" placeholder="Mot de passe"/>
							<input id="SignupEmail" class="LoginBarInput" type="email" placeholder="E-mail"/>
							<input id="SignupContact" class="LoginBarInput" type="tel" placeholder="Contact"/>
							<input id="SingupValidateBtn" class="LoginBarValidateBtn Btn" type="submit" value="Enregistrer"/>
						</form>
					</div>
				</div>
				<span id="LogoutBtn" class="Btn">Se déconnecter</span>
			</div>
			
			<div id="MainMenu">
				<a class="MenuItem Active" href="./">Acceuil</a>
				<div id="StudentSpace" class="MenuItem DropdownBtn">Espace Etudiant
					<div class="Dropdown">
						<a href="student_forum/">Forum Etudiant</a><br/>
						<a href="foad/">Foad</a><br/>
						<a href="old_students/">Réseaux des anciens</a><br/>
					</div>
				</div>
				<div id="Departement" class="MenuItem DropdownBtn">Département ITER
					<div class="Dropdown">
						<a href="rector_speech/">Mot du recteur</a><br/>
						<a href="director_speech/">Mot du directeur</a><br/>
					</div>
				</div>
				<div id="Formations" class="MenuItem DropdownBtn">Nos formations
					<div class="Dropdown">
						<a href="informatic/">Informatique</a><br/>
						<a href="telecom/">Télécommunication</a><br/>
						<a href="electronic/">Electronique</a><br/>
						<a href="networking/">Réseaux</a><br/>
					</div>
				</div>
				<a href="contact_us/" class="MenuItem">Nous contacter</a>
			</div>
		</div>
	</div>
	
	<div id="Views" cur="0">
		<?php
		//the news of artist that print in news screen
		$xml=simplexml_load_file("lib/Views/Views.xml");
		$cnt=$xml->item->count();
		for($i=0;$i<$cnt;$i++){
			if($i==0){
				echo "<div class='ViewsItem' style='background-image:url(".$xml->item[$i]["src"].");'>";
					echo "<center>";
						echo "<a class='ViewsItemText'>".$xml->item[$i]."</a><br></br><br/>";
						echo "<a class='ViewsItemComment'>".$xml->item[$i]["comment"]."</a><br></br><br></br>";
						echo "<b class='ViewsItemBtn Btn' href='".$xml->item[$i]["href"]."'>".$xml->item[$i]["btn"]."</b>";
					echo "</center";
				echo "</div>";
				echo "</div>";
			}
			else{
				echo "<div class='ViewsItem' style='background-image:url(".$xml->item[$i]["src"].");display:none;opacity:0;'>";
					echo "<center>";
						echo "<a class='ViewsItemText'>".$xml->item[$i]."</a><br/><br/><br/>";
						echo "<a class='ViewsItemComment'>".$xml->item[$i]["comment"]."</a><br/><br/><br/><br/>";
						echo "<b class='ViewsItemBtn Btn' href='".$xml->item[$i]["href"]."'>".$xml->item[$i]["btn"]."</b>";
					echo "</center";
				echo "</div>";
				echo "</div>";
			}
		}
		//
		echo "<div id='ViewsBtnBox'>";
			for($i=0;$i<$cnt;$i++){
				if($i==0)echo "<span class='ViewsBtn' ids='".$i."'></span>";
				else echo "<span class='ViewsBtn' style='background-color:rgba(255,255,255,0.5);' ids='".$i."'></span>";
			}
		echo "</div>";
		?>
	</div>
	
	<div id="Schoolings">
		<div id="SchoolingsTitle">
			<center>
			<a class="Slash BlackColor">------</a>
			<a class="Title BlackColor">Nos Formations</a>
			<a class="Slash BlackColor">------</a>
			</center>
		</div>
		
		<div id="FormationsBox">
			<span id="Informatic" class="FormationsItem" href="informatic/">INFORMATIQUE</span>
			<span id="Telecom" class="FormationsItem" href="telecom/">TELECOM</span>
			<span id="Electronic" class="FormationsItem" href="electronic/">ELECTRONIQUE</span>
			<span id="Network" class="FormationsItem" href="Networking/">RESEAUX</span>
		</div>
	</div>
	
	<div id="DirectorBanner">
		<div class="SpeechForm">
			<center>
			<a class="Slash">[</a>
			<a class="Title">Mot du recteur</a>
			<a class="Slash">]</a>
			<br></br><img src="lib/rector.jpg"/><br></br>
			<a class="Btn SpeechFormBtn" href="rector_speech/">Lire</a>
			</center>
		</div>
		<div class="SpeechForm">
			<center>
			<a class="Slash">[</a>
			<a class="Title">Mot du directeur</a>
			<a class="Slash">]</a>
			<br></br><img src="lib/director.jpg"/><br></br>
			<a class="Btn SpeechFormBtn" href="director_speech/">Lire</a>
			</center>
		</div>
	</div>
	
	<img id="Covid19" src="lib/covid19.jpg"/>
	
	<div id="AboutBanner">
		<a class="Slash">---</a>
		<a class="Title">A propos de ITER</a>
		<a class="Slash">---</a>
		<p id="AboutContent"></p>
	</div>
	
	<div id="BottomBanner">
		<div style="background-image:url('icon.png');background-repeat:no-repeat;background-size:100% 100%;"></div>
		<b>copyright 2020 Departement ITER. All rights reserved.</b>
		<a>Made by Departement ITER (+225 08-02-33-21)</a>
	</div>
	<script src="scripts.js"></script>
</body>
</html>