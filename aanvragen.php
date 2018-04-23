<!DOCTYPE html>


<head>

    <title>Brochure aanvraag</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <?php

    include ("header.php");
    include ("dbconnect.php");
//    include ("send_form_email.php");

    ?>

</head>

<body>

<?php

if(isset($_POST['verzend'])) {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];

}

?>

<form method="post" action="redirectAanvraag.php">
    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Persoonlijke gegevens</h4>
        <label for="voornaam">Voornaam*</label>
        <input type="text" class="form-control" id="voornaam" name="voornaam" placeholder="Vul voornaam in..." required>

    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="Tussenvoegsels">Tussenvoegsels</label>
        <input type="text" class="form-control" id="Tussenvoegsesls" placeholder="(optioneel)">
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="achternaam">Achternaam*</label>
        <input type="text" class="form-control" id="achternaam" name="achternaam" placeholder="Vul achternaam in..." required>
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="email">E-Mailadres*</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Vul e-mailadres in..." required>
    </div>




    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Vooropleiding</h4>
        <label for="Opleiding">Opleiding*</label>
        <select class="form-control" id="Opleiding" required>
            <option disabled selected value> -- Kies een optie --</option>
            <option>VWO</option>
            <option>HAVO</option>
            <option>MBO</option>
        </select>
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="verwachtAfstudeerJaar">(verwacht) Afstudeerjaar*</label>
        <select class="form-control" id="verwachtAfstudeerJaar" required>
            <option disabled selected value> -- Kies een optie --</option>
            <option>2020</option>
            <option>2019</option>
            <option>2018</option>
            <option>Al afgestudeerd</option></select>
    </div>



    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Kies de gewenste opleiding</h4>
        <p><b>ICT</b></p>
        <input type="radio" class="form-check-input" id="hboIct" required>
        <label class="form-check-label" for="hboIct">De enige opleiding die er toe doet, HBO-ICT</label>
    </div>



    <div class="container col-md-4 col-md-offset-4 my-4">
        <button type="submit" class="btn btn-dark" id="verzend">Verzenden</button>
    </div>
</form>

</body>

</html>