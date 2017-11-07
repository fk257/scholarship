<?php

	$to = 'test@test.com';  // please change this email id
	
	$errors = array();
	// Check if name has been entered
	if (!isset($_POST['fullname'])) {
		$errors['fullname'] = 'Please enter your full name';
	}

	if (!isset($_POST['date'])) {
		$errors['date'] = 'Please enter your appointment date';
	}

	
	
	// Check if email has been entered and is valid
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Please enter a valid email address';
	}


	
	//Check if message has been entered
	if (!isset($_POST['problem'])) {
		$errors['problem'] = 'Please enter your problem description';
	}

	$errorOutput = '';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;
		die();
	}



	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$problem = $_POST['problem'];
	$date = $_POST['date'];
	$tel = $_POST['tell'];
	$from = $email;
	$subject = 'Appointment Form : Women HealthCare Responsive HTML5 Template';
	
	$body = "From: $fullname\n E-Mail: $email\n Telephone: $tel\n Appointment Date: $date\n Message:\n $problem";


	//send the email
	$result = '';
	if (mail ($to, $subject, $body)) {
		$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Thank You! I will be in touch';
		$result .= '</div>';

		echo $result;
		die();
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Something bad happend during sending this message. Please try again later';
	$result .= '</div>';

	echo $result;
	die();


?>
	