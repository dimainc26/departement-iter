function rWindowEv(){
	//searchinput
	SearchInput.style.width=SearchInput.parentNode.clientWidth-16-SearchBtn.clientWidth+"px";
	//
	ForumListBody.style.maxHeight=innerHeight-160+"px";
	//
	var Drp=document.getElementsByClassName("DiscussRightPart");
	for(var i=0;i<Drp.length;i++){
		Drp[i].style.width=Drp[i].parentNode.clientWidth-Drp[i].parentNode.children[0].clientWidth-48+"px";
		Drp[i].children[1].style.width=Drp[i].clientWidth+"px";
	}
}
rWindowEv();

$(window).resize(function(){rWindowEv();});

//Function to get search forum data
function doSearch(){
	location="../student_forum/?p="+SearchInput.value;
	return false;
}
SearchBtn.onclick=function(){doSearch();};

ForumCreateBtn.onclick=function(){
	if(ForumCreateForm.style.display!="block"){
		ForumCreateForm.style.display="block";
		ForumCreateMinus.innerHTML="-";
		ForumCreateMinus.style.marginRight="13px";
	}
	else{
		ForumCreateForm.style.display="none";
		ForumCreateMinus.innerHTML="+";
		ForumCreateMinus.style.marginRight="8px";
	}
};

//Create topic for forum discuss
function createTopic(){
	ForumCreateName.style.borderColor="#eee";
	ForumCreateSubject.style.borderColor="#eee";
	//
	if(ForumCreateName.value.length<2){
		ForumCreateName.style.borderColor="red";
		return false;
	}
	if(ForumCreateSubject.value.length<2){
		ForumCreateSubject.style.borderColor="red";
		return false;
	}
	var h=HttpGet("../php/topic_create.php?p0="+ForumCreateName.value+"&p1="+ForumCreateSubject.value);
	if(h==1){
		location="../student_forum/";
		return false;
	}
	else{
		alert("Erreur de réseau! veuillez réessayer encore ou plus tard.");
		return false;
	}
	return false;
}


//Create discuss response for forum discuss
function createDiscuss(){
	DiscussInput.style.borderColor="#eee";
	//
	if(DiscussInput.value.length<2){
		DiscussInput.style.borderColor="red";
		return false;
	}
	var h=HttpGet("../php/discuss_create.php?p0="+ForumListTitle.innerText+"&p1="+DiscussInput.value);
	if(h==1){
		location="./?p="+ForumListTitle.innerText;
		return false;
	}
	else{
		alert("Erreur de réseau! veuillez réessayer encore ou plus tard.");
		return false;
	}
	return false;
}


DiscussPostBtn.onclick=function(){createDiscuss();};

//At start the function is executed automatically
function atStart(){
	//Active tab
	StudentSpace.classList.add("Active");
	//set size of right part of dicuss form
	var Rpart=document.getElementsByClassName("DiscussRightPart");
	for(var i=0;i<Rpart.length;i++){
		Rpart[i].style.width=Rpart[i].parentNode.clientWidth-Rpart[i].parentNode.children[0].clientWidth-40+"px";
	}
	//Discuss user profile get data
	DiscussPostUser.children[1].innerHTML=_SESSION["Username"];
	DiscussPostUser.children[0].src="../"+HttpGet("../php/xml_get.php?p1=accounts/"+_SESSION["Username"]+".usr&p2=Image");
}
atStart();