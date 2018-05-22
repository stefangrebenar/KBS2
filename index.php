<!DOCTYPE html>
<html>

<head>

    <title>Brochure aanvraag</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <?php include ("header.php");
    include("include/dbconnect.php");

    ?>

</head>

<body>

<?php
//print_r($_POST);
//?>

<?php
$naam = $email = $achternaam = "";
if(isset($_POST['Voornaam']) && trim($_POST['Voornaam'])!=''
    && isset($_POST['email']) && trim($_POST['email'])!=''
    && isset($_POST['Achternaam']) && trim($_POST['Achternaam'])!='') {
    $naam = $_POST["Voornaam"];
    $email = $_POST["email"];
    $achternaam = $_POST["Achternaam"];

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php

if (isset($_POST['Verzend'])) {
    echo "<div class='alert alert-success container col-md-4 col-md-offset-4 my-4'>
         Mail succesvol verzonden! </div>";
    $to = $email;
    $subject = "Brochure";
    $txt .= 'Leuk dat je geinteresseerd bent in een opleiding bij Windesheim! We hebben je brochure voor je klaargezet.' . "\n";
    $txt .= 'De brochure wordt z.s.m. via de post verstuurd.';

    mail($to, $subject, $txt);
}

?>


<form method="post" action="">
    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Persoonlijke gegevens</h4>
        <label for="Voornaam">Voornaam*</label>
        <input type="text" class="form-control" name="Voornaam" placeholder="Vul voornaam in..." required>

    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="Tussenvoegsels">Tussenvoegsels</label>
        <input type="text" class="form-control" name="Tussenvoegsels" placeholder="(optioneel)">
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="Achternaam">Achternaam*</label>
        <input type="text" class="form-control" name="Achternaam" placeholder="Vul achternaam in..." required>
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="email">E-Mailadres*</label>
        <input type="email" class="form-control" name="email" placeholder="Vul e-mailadres in..." required>
    </div>




    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Vooropleiding</h4>
        <label for="Opleiding">Opleiding*</label>
        <select class="form-control" name="Opleiding" required>
            <option disabled selected value> -- Kies een optie --</option>
            <option>VWO</option>
            <option>HAVO</option>
            <option>MBO</option>
            <option>Anders</option></select>
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="verwachtAfstudeerJaar">(verwacht) Afstudeerjaar*</label>
        <select class="form-control" name="verwachtAfstudeerJaar" required>
            <option disabled selected value> -- Kies een optie --</option>
            <option>2020</option>
            <option>2019</option>
            <option>2018</option>
            <option>Al afgestudeerd</option></select>
    </div>



    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Kies de gewenste opleiding</h4>
        <p><b>ICT</b></p>
        <input type="radio" class="form-check-input" id="hboIct" name="hboIct" required>
        <label class="form-check-label" for="hboIct">De enige opleiding die er toe doet, HBO-ICT</label>
    </div>



    <div class="container col-md-4 col-md-offset-4 my-4">
        <button type="submit" class="btn btn-dark" id="Verzend" name="Verzend">Verzenden</button>

</form>



</body>

</html>