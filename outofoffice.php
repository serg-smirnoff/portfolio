<?php
	
	$ch2 = curl_init();
	curl_setopt($ch2, CURLOPT_URL, "http://dev.boloid.com:9028/partner/categories");
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch2, CURLOPT_HEADER, FALSE);
	//curl_setopt($ch2, CURLOPT_HTTPHEADER, array("X-Access-Token: oUasPyu0dnuy83Fsa"));
	curl_setopt($ch2, CURLOPT_HTTPHEADER, array("OOF-Access-Key: oUasPyu0dnuy83Fsa"));	
	$response2 = curl_exec($ch2);
	curl_close($ch2);					
	$ret2 = json_decode($response2, true);
	print_r ($ret2);
?>