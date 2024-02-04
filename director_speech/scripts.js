function atStart(){
	//Active tab
	Departement.classList.add("Active");
	//
	Speech.innerHTML=HttpGet("../lib/DirectorSpeech.txt");
}
atStart();