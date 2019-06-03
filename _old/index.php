<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<title>Maintenance Ws Test</title>
	<meta name="description" content="Newsletter Test">
	<meta name="author" content="Websolute">
	<meta name="viewport" content="width=device-width, minimal-ui">
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!--<link rel="stylesheet" href="css/styles.css?v=1.0">-->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
	</script>

</head>

<body>
<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" id="form_container">
				<h1>Newsletter Test</h1>
				<form role="form" method="post" id="reused_form">

					<div class="row">
						<div class="col-sm-12 form-group">
							<label for="message">
								Email destinatari:</label>
							<input class="form-control" type="email" id="email" name="email"></input>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 form-group">
							<label for="message">
								Oggetto della mail:</label>
							<input class="form-control" type="text" id="subject" name="subject"></input>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 form-group">
							<label for="message">
								Html:</label>
							<textarea class="form-control" type="textarea" id="message" name="message" 
								rows="7"></textarea>
						</div>
					</div>


					<div class="row">
						<div class="col-sm-12 form-group">
							<button type="submit" width="100" height="100" class="btn btn-lg btn-default pull-right" name="submit">Send →</button>
						</div>
					</div>

				</form>
				<div id="success_message" style="width:100%; height:100%; text-align:center; display:none; ">
					<h3>Posted your message successfully!</h3>
				</div>
				<div id="error_message" style="width:100%; height:100%; text-align:center; display:none; ">
					<h3>Error</h3>
					Sorry there was an error sending your form.

				</div>
			</div>
		</div>
</div>
	
</body>

</html>



<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
//Sending email
if (isset($_POST['submit'])) {
//$to = 'fdigiuseppe@websolute.it';
$to = $_POST['email'];
//$subject = 'Test maintenance';
$subject = $_POST['subject'];
$from = 'test_mail@websolute.it';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$to."\r\n".
		//'Reply-To: '.$to."\r\n" .
		'X-Mailer: PHP/' . phpversion();
$headers .= "";

	$message = $_POST['message'];

	//$message = str_replace(" ' ", " \' ", $message);
		echo "<b>Risposta server: </b>";
		if(mail($to, $subject, $message, $headers)){
			echo 'Mail inviata';
	} else{
			echo 'Errore invio mail';
	}
}
?>