<?php 
    include 'controller/db-connect.php';

    $sgAPIKEY = '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';

    require('./sendgrid-php/sendgrid-php.php'); 


    $email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("test@example.com", "Example User");
	$email->setSubject("Sending with SendGrid is Fun");
	$email->addTo("leomleao@gmail.com", "Example User");
	$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
	$email->addContent(
	    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
	);
	$sendgrid = new \SendGrid($sgAPIKEY);
	try {
	    $response = $sendgrid->send($email);
	    print $response->statusCode() . "\n";
	    print_r($response->headers());
	    print $response->body() . "\n";
	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

?>