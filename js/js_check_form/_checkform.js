function check_form(form){
	if(form.contact_person.value==''){
		alert('���������� ��������� ���� ���������� ����!');
		form.contact_person.focus();
	return false;
	}else if(form.email.value==''){
		alert('���������� ��������� ���� Email!');
		form.email.focus();
	return false;
	}else if(form.phone.value==''){
		alert('���������� ��������� ���� �������!');
		form.phone.focus();
	return false;
	}else if(form.address.value==''){
		alert('���������� ��������� ���� �����!');
		form.address.focus();
	return false;
	}else if(form.comments.value==''){
		alert('���������� ��������� ���� �����������!');
		form.comments.focus();
	return false;
	}else{
	return true;
	}
}