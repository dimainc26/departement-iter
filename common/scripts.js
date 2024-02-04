var _SESSION=new Array();

function initializing(){
	//Preloader
	Preloader.innerHTML=HttpGet("../common/preloader.html");
	PreloaderImg.style.left=innerWidth/2-PreloaderImg.clientWidth/2+"px";
	PreloaderImg.style.top=innerHeight/2-PreloaderImg.clientHeight/2+"px";
	//initializing
	TopBanner.innerHTML=HttpGet("../common/top_banner.html");
	BottomBanner.innerHTML=HttpGet("../common/bottom_banner.html");
	
	//Check if user is connected or no
	var h=HttpGet("../php/session_is_connected.php");
	if(h==1){
		LoginBtn.style.display="none";
		SignupBtn.style.display="none";
		LogoutBtn.style.display="block";
		_SESSION["Username"]=HttpGet("../php/session_get_name.php");
		Hostname.children[1].innerHTML=_SESSION["Username"];
		Hostname.children[0].src="../"+HttpGet("../php/xml_get.php?p1=accounts/"+_SESSION["Username"]+".usr&p2=Image");
		StudentSpace.style.display="block";
	}
	else{
		Hostname.innerHTML=location.hostname;
		Hostname.style.padding="9px";
		LoginBtn.style.display="block";
		SignupBtn.style.display="block";
	}
}
initializing();

//Remove preloader when page is load successfully
$(document).ready(function(){
	setTimeout(function(){
		document.body.removeChild(Preloader);
	},1000);
});

//Display AccountForm when player click and hide when player click anywhere
$(".AccountBtn").click(function(){
	$(".AccountDropdown").css("display","none");
	this.children[0].style.display="block";
	
});

$("body").click(function(event){
	var t=event.target.className;
	var p=event.target.parentNode.className;
	var pp=event.target.parentNode.parentNode.className;
	if(t.indexOf("AccountDropdown")<0 && t.indexOf("AccountBtn")<0 &&
	p.indexOf("AccountDropdown")<0 && p.indexOf("AccountBtn")<0 && 
	pp.indexOf("AccountDropdown")<0 && pp.indexOf("AccountBtn")<0)$(".AccountDropdown").css("display","none");
});

//load user image
var Avatar=document.getElementById("SignupAvatar");
var File=document.getElementById("SignupFile");
Avatar.onclick=function(){File.click();};
File.oninput=function(){imageReadUrl(this,Avatar);};

//Session disconnect
LogoutBtn.onclick=function(){
	HttpGet("../php/session_disconnect.php");
	location="../";
}

//function validate()
function LoginValidate(){
	var Name=document.getElementById("LoginName");
	var Password=document.getElementById("LoginPassword");
	Name.style.border="solid 1px #ccc";
	Password.style.border="solid 1px #ccc";
	//
	if(Name.value=="" && Password.value==""){
		Name.style.border="solid 1px red";
		Password.style.border="solid 1px red";
		return false;
	}
	//
	var q=HttpGet("../php/account_check_name.php?p="+Name.value);
	if(!q){
		Name.style.border="solid 1px red";
		return false;
	}
	//Get the password
	var p=HttpGet("../php/account_get_password.php?p="+Name.value);
	//Password is correct
	if(p!="" && Password.value==p){
		var h=HttpGet("../php/session_connect.php?p1="+Name.value+"&p2="+Password.value);
		if(h){
			location="./";
			return false;
		}
	}
	//Number or password error;
	Password.style.border="solid 1px red";
	return false;
}

//Signup Account Validate
function SignupValidate(){
	var Name=document.getElementById("SignupName");
	var Password=document.getElementById("SignupPassword");
	var Email=document.getElementById("SignupEmail");
	var Contact=document.getElementById("SignupContact");
	Name.style.border="solid 1px #ccc";
	Password.style.border="solid 1px #ccc";
	Email.style.border="solid 1px #ccc";
	Contact.style.border="solid 1px #ccc";
	//Check username
	var h=HttpGet("../php/account_check_name.php?p="+Name.value);
	if(h==1 || !checkName(Name.value)){
		Name.style.border="solid 1px red";
		return false;
	}
	//check password
	if(!checkPassword(Password.value)){
		Password.style.border="solid 1px red";
		return false;
	}
	//check email
	if(!checkEmail(Email.value)){
		Email.style.border="solid 1px red";
		return false;
	}
	//check contact
	if(Contact.value.length<8){
		Contact.style.border="solid 1px red";
		return false;
	}
	//is ok get all data
	var d="p0="+Name.value;
	d=d+"&p1="+Password.value;
	d=d+"&p2="+Email.value;
	d=d+"&p3="+Contact.value;
	
	//upload image if is selected
	var File=document.getElementById("SignupFile");
	if(File.value!=""){
		var r=fileUpload(File.files[0],"images");
		if(r==""){
			alert("Erreur de chargement de la photo!");
			return false;
		}
		d=d+"&p4="+r;
	}
	else{
		d=d+"&p4=lib/Avatar.png";
	}
	
	//create account
	var h=HttpPost("../php/account_add.php?"+d);
	if(!h){
		return false;
	}
	location="./";
}