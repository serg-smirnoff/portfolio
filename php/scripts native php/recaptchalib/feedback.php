<?php

include_once("recaptchalib.php");

$secret = "6LfP0WAUAAAAABiFj5IynrImYQgC4niRIG7XvfbZ";
$response = null;
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"],$_POST["g-recaptcha-response"]);

if ( ($response != null) && ($response->success) /*&& ($_POST['email']) && ($_POST['formid'] == 'order') && ($_SERVER["REQUEST_URI"] == "/") && ($_SERVER["QUERY_STRING"] == "")*/ ) {

	require_once("class.phpmailer.php");
	
	$email = new PHPMailer();
	$email->CharSet = "UTF-8";

	if (isset($_POST['name']))  $name = htmlspecialchars(stripslashes($_POST['name']));
	if (isset($_POST['email']))	$emailFrom = filter_var(htmlspecialchars(stripslashes($_POST['email'])), FILTER_VALIDATE_EMAIL);
	if (isset($_POST['phone'])) $phone = htmlspecialchars(stripslashes($_POST['phone']));
	if (isset($_POST['text']))  $text = htmlspecialchars(stripslashes($_POST['text']."\r\nОтправлено с IP адреса: ".$_SERVER["REMOTE_ADDR"]))."
	\r\nПройдена проверка reCaptcha\r\nОтправлено с IP адреса: ".$_SERVER["REMOTE_ADDR"]."\r\nUNIQUE_ID: ".$_SERVER["UNIQUE_ID"]."\r\nHTTP_USER_AGENT: ".$_SERVER["HTTP_USER_AGENT"];

	$message = "Имя: ".$name."\nEmail: ".$emailFrom."\nТелефон: ".$phone."\nСообщение: ".$text."\n";

	$email->From      = $emailFrom;
	$email->FromName  = $name;
	$email->Subject   = 'Сообщение с сайта';
	$email->Body      = $message;
	//$email->AddAddress('sestrenka_yelena@mail.ru');
	$email->AddAddress('info@onlysites.ru');

	if ($email->Send()) header("Location: http://elena-kuzina.ru/mail_send_ok.html"); else echo "Что-то пошло не так, к сожалению...";
	
}

?>