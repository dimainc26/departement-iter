<?php
function createForm($Name,$Xml2){
	//creating of forum item
	echo "<div class='ForumItem' name='".$Name."' subject='".$Xml2->Subject."'>";
		echo "<img class='ForumItemIcon' src='../lib/forum.png'/>";
		//
		echo "<div class='ForumItemTitle'>"; 
			echo "<b>".$Name."</b></br>";
			echo "<a>".$Xml2->Subject."</a>";
		echo "</div>";
		//
		echo "<div class='ForumItemRight'>";
			//
			echo "<div class='ForumItemPost'>";
				echo "<center><a>".$Xml2->Forum->Item->count()."</a></br>";
				echo "<b>Postes</b></center>";
			echo "</div>";
			//
			$Author=$Xml2->Author;
			echo "<div class='ForumItemAuthor'>";
				if(file_exists("../accounts/".$Author.".usr")){
					$Xml3=simplexml_load_file("../accounts/".$Author.".usr");
					echo "<img src='../".$Xml3->Image."'/>";
				}
				else{
					echo "<span>".substr($Author,0,1)."</span>";
				}
				echo "<a>".$Author."</a>";
			echo "</div>";
			//
		echo "</div>";
	echo "</div>";
}
?>