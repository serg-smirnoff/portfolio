function sendform() {
	
	var form_wrapper = jQuery('.send-to-email-form-inner');
	var form = jQuery('#send-to-email-form');
	var fields = form.serialize();
	
	jQuery.ajax({
		type: 'POST',
		url: '/wp-content/themes/dugriteam/sendform.php',
		dataType: 'json',
		data: {
			fields: fields
		},
		success: function(data){
			
			console.log ( data );
			
			if (data.status == 'error') {
				
				jQuery('#send-to-email-form-result-modal').arcticmodal();
				jQuery(".send-to-email-form-result").html('Ошибка. Проверьте правильность заполнения поля Email');

			} else if (data.status == 'success') {
				
				yaCounter45704514.reachGoal('email-dogovor');
				ga('send','event','goals','email-dogovor');
				
				jQuery('#send-to-email-form-result-modal').arcticmodal();
				jQuery('.send-to-email-form-result').html('Договор на оказание медицинских услуг MDC International отправлен на ваш Email');
				
			}
			
		}
	});
}