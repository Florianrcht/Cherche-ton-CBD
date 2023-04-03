<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nom = $_POST["nom"];
	$email = $_POST["email"];
	$message = $_POST["message"];

	$to = "CTFCBD@gmail.com";
	$subject = "Nouveau message de contact de votre site CBD";
	$body = "Nom : " . $nom . "\n\nEmail : " . $email . "\n\nMessage : " . $message;

	if (mail($to, $subject, $body)) {
		echo "Merci pour votre message ! Nous vous contacterons dès que possible.";
	} else {
		echo "Désolé, une erreur s'est produite. Veuillez réessayer plus tard.";
	}
}
?>
