<?php

if(isset($_POST['email'])) {

    $email_to = "stefangrebenar@hotmail.com";
    $email_subject = "Brochure";

    function died($error) {

        echo "Er ging iets mis met het invullen van het formulier.   ";
        echo "Dit is fout gegaan<br /><br />";
        echo $error."<br /><br />";
        echo "Verbeter uw opgave A.U.B.<br /><br />";
        die();
    }


    if(!isset($_POST['voornaam']) ||
        !isset($_POST['achternaam']) ||
        !isset($_POST['email']) ||
        died('Het formulier is niet compleet ingevuld.'));
    }



    $voornaam = $_POST['voornaam']; // required
    $achternaam = $_POST['achternaam']; // required
    $email_van = $_POST['email']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_van)) {
        $error_message .= 'Het E-Mail adres dat u heeft opgegeven is niet correct.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$voornaam)) {
        $error_message .= 'De voornaam die u heeft opgegeven is niet correct.<br />';
    }

    if(!preg_match($string_exp,$achternaam)) {
        $error_message .= 'De achternaam die u heeft opgegeven is niet correct.<br />';
    }

    if(strlen($error_message) > 0) {
        died($error_message);
    }

    $email_message = "Formulier details.\n\n";


    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }



    $email_message .= "Voornaam: ".clean_string($voornaam   )."\n";
    $email_message .= "Achernaam: ".clean_string($achternaam)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";


// create email headers
    $headers = 'Van: '.$email_from."\r\n".
        'Antwoord-Naar: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!-- include your own success html here -->

    Hierbij uw brochure!


?>