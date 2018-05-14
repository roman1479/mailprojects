// валидация типов очереди в работник 
function typeocheredname(){
	myelement = document.getElementById('inputtype');
	s="ЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮйцукеннгшшщзщзхъфывапролдждэяячсмитьбю ";
	myelement.style.borderColor="grey";
	d=myelement.value;
	for (i=0; i<d.length;i++){
		k = s.indexOf(d[i]);
		if(k<0){
			myelement.style.borderColor="red";
			alert("Тип очереди должно содержать только кирилицу и пробел");
			break;
		}
	}
}
// валидация префикс очереди в работник
function typeocheredletter(){
	myelement = document.getElementById('inputlet');
	s="ЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ";
	myelement.style.borderColor="grey";
	d=myelement.value;
	for (i=0; i<d.length;i++){
		k = s.indexOf(d[i]);
		if(k<0){
			myelement.style.borderColor="red";
			alert("Буква очереди должна содержать только кирилицу заглавными буквами");
			break;
		}
	}
}
function namewindow(){
	myelement = document.getElementById('inputwin');
	s="1234567890";
	myelement.style.borderColor="grey";
	d=myelement.value;
	for (i=0; i<d.length;i++){
		k = s.indexOf(d[i]);
		if(k<0){
			myelement.style.borderColor="red";
			alert("Имя окна должно содержать только цифру");
			break;
		}
	}
}