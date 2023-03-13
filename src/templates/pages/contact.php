    
<?php

$page_title =" Accueil - CTCBD.com";

ob_start()
?>

<body>
    <?php 
        $file_name = "CONTACT";
        if (isset($_SESSION['user_id'])) {
    ?>
    <section>
        <div class="infos-container">
            <div class="info1">
                    <div class="type-infos1">
                        <img src="assets/images/telephone.png" alt="icon phone">
                    </div>
                    <p class="gridinfos">06 05 04 03 02</p>
            </div>
            <div class="info2">
                <div class="type-infos2">
                    <img src="assets/images/mail.png" alt="icon mail">
                </div>
                <p class="gridinfos">support@powerofmemory.com</p>
            </div>
            <div class="info3">
                <div class="type-infos3">
                    <img src="assets/images/checkpoint.png" alt="icon checkpoint">
                </div>
                <p class="gridinfos">Paris</p>
            </div>
        </div>

        <div class="form-container">
            <form method ="post">
                <input type="text" name="nom" placeholder="Nom" id="form" />
                <input type="text" name="email" placeholder="Email" id="form" /></br>
                <input type="text" name="sujet" placeholder="Sujet" id="form" /></br>
                <textarea name="message" placeholder="Message" id="form"></textarea></br>
                <input type='submit' id="buttonsend" name="submit" />
            </form>
            <p>
                <?php
                if(isset($_POST['submit'])){
                    
                    if (empty($_POST["nom"])) {
                        echo '<p style ="color:white"> Veuillez vérifier le formulaire - veuillez saisir votre nom.';

                    }
                    
                    else if (!empty($_POST["email"])){
                        $point = strpos($_POST['email'], ".");
                        $arobase = strpos($_POST['email'], "@");
                        if ($point === false)
                            echo '<p style ="color:white">Veuillez vérifier le formulaire - votre email doit comporter un point.</p>';
                        else if ($arobase === false)
                            echo '<p style ="color:white">Veuillez vérifier le formulaire - votre email doit comporter un arobase.</p>';
                        else {
                            if(empty($_POST["sujet"])){
                                echo '<p style ="color:white">Veuillez vérifier le formulaire - veuillez saisir un sujet.</p>';
                            } else {
                                if(strlen($_POST['message']) < 15){
                                    echo '<p style ="color:white">Veuillez vérifier le formulaire - veuillez saisir un message plus long.</p>';
                                } else {
                                    echo "Envoie du message";
                                }
                            }
                        }
                    } else {
                        echo '<p style ="color:white">Veuillez vérifier le formulaire - veuillez saisir un email.</p>';
                    }
                }else{
                    echo '<p style ="color:white">Veuillez vérifier le formulaire</p>';
                }

                ?>


            </p>
        </div>
    </section>
</body>