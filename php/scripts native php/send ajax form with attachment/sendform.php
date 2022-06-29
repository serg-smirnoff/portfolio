<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fields']) ){

	$params = array();
	$response = array();
	$data = array();
	$error = array();
		
    parse_str($_POST['fields'], $params);
	
	foreach ( $params as $key => $value ) {
        $data[$key] = $value;
	}

	foreach ( $data as $key => $value ) {
        if ( ($value == '' ) ) {
            $error[$key] = '';
        }
	}
	
    if ( !empty($error) ) {
		
		$response['status'] = 'error';
		
		foreach ( $error as $key=>$val ) {
            $response[$key] = $val;
        }

	} else {

        require_once('class.phpmailer.php');

		$emailto = filter_var(stripslashes($data['send-to-email-text-field']), FILTER_VALIDATE_EMAIL);
		
		if(isset($emailto)){

			$email = new PHPMailer;
			$email->From = 'MDC-INT <noreply@mdc-int.com>';
			$email->FromName = 'MDC-INT';
			$email->Subject = 'Договор на оказание медицинских услуг';
			$email->Body = 'Договор на оказание медицинских услуг';
			$email->AddAttachment('/home1/mdcintco/public_html/wp-content/uploads/2018/05/agreement.pdf');
			$email->AddAddress($emailto);
			$email->isHTML(true);
			//$email->CharSet = 'UTF-8';
			$email->send();
		}
        
		$response['status'] = 'success';       
		//$response['text'] = 'Договор на оказание медицинских услуг MDC International отправлен на ваш Email';
    
	}
    
	die(json_encode($response));
	
} else {
	
	die('Ошибка. Проверьте правильность заполнения поля Email');
	
}	

?>