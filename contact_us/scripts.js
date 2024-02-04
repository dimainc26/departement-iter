function atStart(){
	//Active tab
	ContactUs.classList.add("Active");
	//Check if user is connected or no
	var h=HttpGet("../php/session_is_connected.php");
	if(h==1){
		ContactName.value=_SESSION["Username"];
		ContactEmail.value=HttpGet("../php/xml_get.php?p1=accounts/"+_SESSION["Username"]+".usr&p2=Email");
	}
}
atStart();


//Write an Email from Send Email php
ContactSendBtn.onclick=function(){
	//ALl occurent errors
	if(ContactName.value.length==0 && ContactEmail.value.length==0 && ContactText.value.length==0){
		ContactError.innerText="ERREUR: Veuillez remplir tous les champs vide !";
		ContactError.style.display="block";
		setTimeout(function(){
			ContactError.style.display="none";
		},3000);
		return;
	}
	//
	if(!checkName(ContactName.value)){
		ContactError.innerText="ERREUR: Ce nom est invalide !";
		ContactError.style.display="block";
		setTimeout(function(){
			ContactError.style.display="none";
		},3000);
		return;
	}
	//
	if(ContactEmail.value.length==0){
		ContactError.innerText="ERREUR: Veuillez saisir votre adresse email !";
		ContactError.style.display="block";
		setTimeout(function(){
			ContactError.style.display="none";
		},3000);
		return;
	}
	//
	if(!checkEmail(ContactEmail.value)){
		ContactError.innerText="ERREUR: Ce email est invalide !";
		ContactError.style.display="block";
		setTimeout(function(){
			ContactError.style.display="none";
		},3000);
		return;
	}
	//
	if(ContactText.value.length==0){
		ContactError.innerText="ERREUR: Veuillez saisir un message !";
		ContactError.style.display="block";
		setTimeout(function(){
			ContactError.style.display="none";
		},3000);
		return;
	}
	if(ContactText.value.length<4){
		ContactError.innerText="ERREUR: Votre message est trop court !";
		ContactError.style.display="block";
		setTimeout(function(){
			ContactError.style.display="none";
		},3000);
		return;
	}
	//
	
	var h=HttpGet("../php/email_send_message.php?p1="+ContactName+"&p2="+ContactEmail+"&p3="+ContactText);
	//alert(h);
	if(h!=1){
		ContactError.innerText="ERREUR: Le message n'a as été envoyé !";
		ContactError.style.display="block";
		setTimeout(function(){
			ContactError.style.display="none";
		},3000);
		return;
	}
	ContactState.style.display="block";
	setTimeout(function(){
		ContactState.style.display="none";
	},3000);
	//
	ContactName.value="";
	ContactEmail.value="";
	ContactText.value="";
};