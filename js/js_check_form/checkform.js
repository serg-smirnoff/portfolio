function check_form(form){
	if(form.company.value==''){
		alert('Введите название компании, или ФИО!');
		form.company.focus();
		return false;
	}else if(form.fio.value==''){
		alert('Введите ФИО!');
		form.fio.focus();
		return false;
	}else if(form.email.value==''){
		alert('Введите email!');
		form.email.focus();
		return false;
	}else if(form.phone.value==''){
		alert('Введите телефон!');
		form.time.phone();
		return false;
	}else if(form.time.value==''){
		alert('Введите удобное время для связи!');
		form.time.focus();
		return false;
	}else{
		document.forms.order.submit();
		return true;
	}
}