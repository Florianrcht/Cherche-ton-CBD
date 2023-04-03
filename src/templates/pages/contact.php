    
<?php

$page_title =" Accueil - CTCBD.com";

ob_start()
?>

<body>
	<h1>Contactez-nous !</h1>
	<form method="post" action="envoyer.php">
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" value=<?=$_SESSION['user']['pseudo']?> required>

		<label for="email">Email :</label>
		<input type="email" id="email" name="email" value=<?=$_SESSION['user']['email']?> required>

		<label for="message">Message :</label>
		<textarea id="message" name="message" required></textarea>

		<input type="submit" value="Envoyer">
	</form>
</body>
<br><br><br><br><br><br><br>


<?php
$page_content = ob_get_clean();

?>