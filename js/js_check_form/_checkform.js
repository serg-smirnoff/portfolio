function check_form(form){
	if(form.contact_person.value==''){
		alert('Необходимо заполнить поле Контактное лицо!');
		form.contact_person.focus();
	return false;
	}else if(form.email.value==''){
		alert('Необходимо заполнить поле Email!');
		form.email.focus();
	return false;
	}else if(form.phone.value==''){
		alert('Необходимо заполнить поле Телефон!');
		form.phone.focus();
	return false;
	}else if(form.address.value==''){
		alert('Необходимо заполнить поле Адрес!');
		form.address.focus();
	return false;
	}else if(form.comments.value==''){
		alert('Необходимо заполнить поле Комментарий!');
		form.comments.focus();
	return false;
	}else{
	return true;
	}
}