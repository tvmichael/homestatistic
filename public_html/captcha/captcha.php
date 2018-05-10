<?php
echo 'CAPTCHA!<br>';
$name = $_POST['name'];
echo "<h1>Name: $name</h1>";

	
	$response = $_POST["g-recaptcha-response"];
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6Ld4ZDkUAAAAAKgldm5c1SiNrSJC2MXHG1PfVQia',
		'response' => $_POST["g-recaptcha-response"]
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success = json_decode($verify);
	if ($captcha_success->success==false) {
		echo "<p>You are a bot! Go away!</p>";
	} else if ($captcha_success->success==true) {
		echo "<p>You are not not a bot!</p>";
	}


?>

<br/><kbd><pre><?php var_export($_POST); ?></pre></kbd>