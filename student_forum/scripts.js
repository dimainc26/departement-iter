function atStart(){
	//Active tab
	StudentSpace.classList.add("Active");
}
atStart();

function rWindowEv(){
	//searchinput
	SearchInput.style.width=SearchInput.parentNode.clientWidth-16-SearchBtn.clientWidth+"px";
	//Small screen
	if(innerWidth<=512){
	}
}
rWindowEv();
window.onresize=function(){rWindowEv();};

//Function to get search forum data
function doSearch(){
	location="./?p="+SearchInput.value;
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
		location="./";
		return false;
	}
	else{
		alert("Erreur de réseau! veuillez réessayer encore ou plus tard.");
		return false;
	}
	return false;
}

$(".ForumItem").click(function(){
	location="../forum_discuss/?p="+this.getAttribute("Name");
});