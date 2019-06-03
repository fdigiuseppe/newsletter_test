<?php

class Form {
	var $destinatario;
	var $oggetto;
	var $messaggio;
	var $result;

	function __construct()
   {
			 $this->destinatario = "";
			 $this->oggetto = "";
			 $this->messaggio = "";
	 }

	 function setForm($destinatario,$oggetto,$messaggio)
   {
			 $this->destinatario = $destinatario;
			 $this->oggetto = $oggetto;
			 $this->messaggio = $messaggio;
	 }
	 
	 function getDestinatario() {
		 return $this->destinatario;
	 }

	 function getOggetto() {
		 return $this->oggetto;
	 }

	 function getMessaggio() {
		 return $this->messaggio;
	 }

	 function setDestinatario($destinatario) {
		 $this->destinatario = $destinatario;
	 }

	 function setOggetto($oggetto) {
		 $this->oggetto = $oggetto;
	 }

	 function setMessaggio($messaggio) {
		 $this->messaggio = $messaggio;
	 }

	 function sendMail(Form $f) {

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			//$headers .= 'From: '.$f->getDestinatario()."\r\n";
			$headers .= 'From: ' . 'NewsletterTest@websolute.it' . "\r\n";
			$headers .= 'Reply-To: '.$f->getDestinatario()."\r\n";
			$headers .= 'X-Mailer: PHP/' . phpversion();

			//echo "<b>Invio Mail: </b>";
			if(mail($f->getDestinatario(), $f->getOggetto(), $f->getMessaggio(), $headers)){
					//echo 'Mail inviata';
					$info = "<b>Resoconto Email </b><br/>" . "<br/>" . "Destinatario:" .$f->getDestinatario(). "<br/>" . "Oggetto: " . $f->getOggetto(). "<br/>" . "Messaggio: ". $f->getMessaggio();
					mail('fdigiuseppe@websolute.it','Resoconto mail',$info, $headers);
					$result = 1;
			} else{
					//echo 'Errore invio mail';
					$result = 0;
			}

			return $result;
		}

}


?>