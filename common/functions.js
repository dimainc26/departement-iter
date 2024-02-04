/*-----------------------------------
Made by ouya jean marc olivier alias wane marao @AoFusionDevs
-----------------------------------*/
//function HttpGet()
function HttpGet(url){
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.open("GET",url,false); 
	xmlHttp.send(null);
	return xmlHttp.responseText;
}

//function HttpPost()
function HttpPost(url){
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.open("POST",url,false);// false for synchronous request 
	xmlHttp.send(null);
	return xmlHttp.responseText;
}

//checkEmail()
function checkEmail(t){
	if(t.indexOf("@")>=1 && t.indexOf(".")>=t.indexOf("@")+1)return true;
	return false;
}

//checkName()
function checkName(t){
	if(t.length<3)return false;
	var c="\"';?!{[()]}";
	for(var i=0;i<t.length;i++){
		if(c.indexOf(t.substr(i,1))>=0)return false;
	}
	return true;
}

//checkPassword()
function checkPassword(t){
	if(t.length<4)return false;
	return true;
}

//read image from file url
function imageReadUrl(input,output){
	if(input.files && input.files[0]){
		var reader=new FileReader();
		reader.onload=function(e){
			output.src=e.target.result;
		}
		reader.readAsDataURL(input.files[0]);
	}
}

//Upload file function
function fileUpload(f,t){
	//file input object
	var xmlHttp=new XMLHttpRequest(); 
	var formData=new FormData();
	formData.append("p1",f);
	formData.append("p2",t);
	xmlHttp.open("POST","php/file_upload.php",false);
	xmlHttp.send(formData);
	return xmlHttp.responseText;
}

function fileUpload2(f,t){
	//file input object
	var xmlHttp=new XMLHttpRequest(); 
	var formData=new FormData();
	formData.append("p1",f);
	formData.append("p2",t);
	xmlHttp.open("POST","../php/file_upload.php",false);
	xmlHttp.send(formData);
	return xmlHttp.responseText;
}

//download file function
function downloadFile(path,name){
	var d=document.createElement("a");
	d.href=path;
	d.download=name;
	document.body.appendChild(d);
	d.click();
	document.body.removeChild(d);
}

//file upload get progress value
function fileUploadProgress(){
	return HttpGet("php/file_upload_progress.php");
}
/*-------------------------------------
NotifyBox
-------------------------------------*/
//NotifyBox
function doNotify(t){
	var o=document.createElement("div");
	o.className="PushFx NotifyBox";
	o.innerHTML=t;
	document.body.appendChild(o);
	o.style.left=innerWidth/2-o.clientWidth/2+"px";
	setTimeout(function(){
		document.body.removeChild(o);
	},3000);
}

//Copy to clipboard function
function fbkCopy(text){
	var t=document.createElement("textarea");
	t.value=text;
	document.body.appendChild(t);
	t.focus();
	t.select();
	try{
		var successful= document.execCommand('copy');
		var msg = successful ? 'successful' : 'unsuccessful';
		//on copy error!
			doNotify("Message copié");
		}
		catch(err){
			//on copy error!
			doNotify("Erreur: Message non copié");
		}
		document.body.removeChild(t);
	}
	
function copyText(text){
	//Correct Text syntax as <div>
	text=text.replace(/<div>/g,"\n");
	text=text.replace(/<\/div>/g,"");
	
	//if navigator clipboard don't exist
	if(!navigator.clipboard){
		fbkCopy(text);
		return;
	}
	//else...
	navigator.clipboard.writeText(text).then(function(){
	//if copy is success!
	doNotify("Message copié");
	},function(err){
	//on copy error!
	fbkCopy(text);
	});
}

/* ---------------------
parser functions 
----------------------*/
//parserGetCount
function parserGetCount(text,parser){
	if(text=="")return 0;
	if(parser=="")return 1;
	var count=0;
	for(var a=0;a<text.length;a++){
		a=text.indexOf(parser,a);
		if(a<0){
			count++;
			break;
		}
		count++;
	}
	return count;
}

//parserGetStart
function parserGetStart(text,parser,id){
	if(id<0 || id>=parserGetCount(text,parser))return 0;
	var cur=0;
	var a=0;
	for(;a<text.length && cur<id;a++){
		a=text.indexOf(parser,a);
		if(a<0)return 0;
		cur++;
	}
	return a;
}

//parserGetEnd
function parserGetEnd(text,parser,id){
	if(id<0 || id>=parserGetCount(text,parser))return 0;
	var cur=-1;
	var a=0;
	for(;a<text.length && cur<id;a++){
		a=text.indexOf(parser,a);
		if(a<0)return text.length;
		cur++;
	}	
	return a-1;
}

//parserGetItem
function parserGetItem(text,parser,id){
	if(text=="" || id<0 || id>=parserGetCount(text,parser))return "";
	var a=parserGetStart(text,parser,id);
	var b=parserGetEnd(text,parser,id);
	return text.slice(a,b);
}

//get main image color
function getAverageColor(img){
	var context = document.createElement('canvas').getContext('2d');
		img2=new Image;
		img2.setAttribute('crossOrigin','');
		img2.src=img.src;
	context.imageSmoothingEnabled=true;
	context.drawImage(img2, 0, 0, 1, 1);
	return context.getImageData(1, 1, 1, 1).data.slice(0,3);
}



function insertAtCursor(myField,myValue){
    //IE support
    if(document.selection){
        myField.focus();
        sel=document.selection.createRange();
        sel.text=myValue;
    }
    //MOZILLA and others
    else if(myField.selectionStart||myField.selectionStart=="0"){
        var startPos=myField.selectionStart;
        var endPos=myField.selectionEnd;
        myField.value=myField.value.substring(0,startPos)+myValue+myField.value.substring(endPos,myField.value.length);
    }
	else{
        myField.value+=myValue;
    }
	myField.focus();
	myField.setSelectionRange(startPos+2,startPos+2);
}