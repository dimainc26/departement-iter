function atStart(){
	//Active tab
	Departement.classList.add("Active");
	//
	Speech.innerHTML=HttpGet("../lib/RectorSpeech.txt");
}
atStart();