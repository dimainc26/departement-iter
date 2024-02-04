<?php
function createForm($Item){
	//creating of forum item
	echo "<div class='DiscussItem'>";
		echo "<div class='DiscussLeftPart'>";
			$Author=$Item["author"];
			echo "<a>".$Author."</a><br>";
			//
			if(file_exists("../accounts/".$Author.".usr")){
				$Xml3=simplexml_load_file("../accounts/".$Author.".usr");
				echo "<img src='../".$Xml3->Image."'/><br>";
			}
			else{
				echo "<span>".substr($Author,0,1)."</span><br>";
			}
			//
			
		echo "</div>";
		echo "<div class='DiscussRightPart'>";
			echo "<a>".$Item["d"]."/".$Item["m"]."/".$Item["y"]." à ".$Item["h"]."h".$Item["min"]."</a>";
			echo "<p>".$Item."</p>";
		echo "</div>";
	echo "</div>";
}
?>