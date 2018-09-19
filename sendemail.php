<?php

// Define some constants
define( "RECIPIENT_NAME", "Auto Mecanica Palenque | Conntacto" );
define( "RECIPIENT_EMAIL", "contacto@automecanicapalenque.com" );



// Read the form values
$success = false;
$senderName = isset( $_POST['username'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['username'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $senderName && $senderEmail && $phone && $message && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "De: " . $senderName . " <" . $senderEmail . ">";
  $msgBody = "De: " . $senderName . "\n\nCorreo: " . $senderEmail . "\n\nTelefono: " . $phone . "\n\nMensaje: ". $message;
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
 header('Location: contact.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html?message=Failed');	
}

?>