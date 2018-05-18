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
$naam = $email = $achternaam = "";
if(isset($_POST['Voornaam']) && trim($_POST['Voornaam'])!=''
    && isset($_POST['email']) && trim($_POST['email'])!=''
    && isset($_POST['Achternaam']) && trim($_POST['Achternaam'])!='') {
    $naam = test_input($_POST["Voornaam"]);
    $email = test_input($_POST["email"]);
    $achternaam = test_input($_POST["Achternaam"]);

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php

if (isset($_REQUEST['email'])) {

    $to = $email;
    $subject = "Brochure";
    $from = 'stefangrebenar@hotmail.com';
    $body = '<html><body>';
    $body .= '<img src="logo.png" alt="WindesheimLogo" /><br/>';
    $body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $body .= '<p style="color:#3366FF;font-size:14px;">Beste' . ' ' . $naam . ', </p>';
    $body .= '<p style="color:#3366FF;font-size:14px;">Leuk dat je geïnteresseerd bent in een opleiding bij Windesheim! We hebben je brochure voor je klaargezet.</p>';
    $body .= '<p> <a href="https://i.imgur.com/4MGdogb.jpg">Klik hier voor je brochure!</a> </p>';
    $body .= "</table>";
    $body .= "</body></html>";

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers = "Van: $from \r\n";
    $headers .= "Naar: $email\r\n";
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n" .

        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $body, $headers);
}
?>

<?php

if (isset($_POST['verzend'])) {
    try {

        $achternaam = $_POST['Achternaam'];
        $voornaam = $_POST['Voornaam'];
        $email = $_POST['email'];

        $tussenvoegsel = $_POST['Tussenvoegsel'];
        $opleiding = $_POST['Opleiding'];
        $verwachtAfstudeerJaar = $_POST['verwachtAfstudeerJaar'];

        $sql = /** @lang SQL */
            "INSERT INTO form (Voornaam, Tussenvoegsel, Achternaam, Email, Opleiding, Afstudeerjaar) VALUES (:Voornaam, :Tussenvoegsel, :Achternaam, :Email, :Opleiding, :Afstudeerjaar)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':Voornaam', $voornaam, PDO::PARAM_INT);
        $stmt->bindValue(':Tussenvoegsel', $tussenvoegsel, PDO::PARAM_STR);
        $stmt->bindValue(':Achternaam', $achternaam, PDO::PARAM_STR);
        $stmt->bindValue(':Email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':Opleiding', $opleiding, PDO::PARAM_INT);
        $stmt->bindValue(':verwachtAfstudeerJaar', $verwachtAfstudeerJaar, PDO::PARAM_INT);


        $stmt->execute();

    } catch (PDOException $e) {
        print "Error! $e";
    }
}

?>

<?php

mysqli_close($conn);

?>


<form method="post" action="redirectAanvraag.php">
    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Persoonlijke gegevens</h4>
        <label for="Voornaam">Voornaam*</label>
        <input type="text" class="form-control" id="Voornaam" placeholder="Vul voornaam in..." required>

    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="Tussenvoegsels">Tussenvoegsels</label>
        <input type="text" class="form-control" id="Tussenvoegsesls" placeholder="(optioneel)">
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="Achternaam">Achternaam*</label>
        <input type="text" class="form-control" id="Achternaam" placeholder="Vul achternaam in..." required>
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="email">E-Mailadres*</label>
        <input type="email" class="form-control" id="email" placeholder="Vul e-mailadres in..." required>
    </div>




    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Vooropleiding</h4>
        <label for="Opleiding">Opleiding*</label>
        <select class="form-control" id="Opleiding" required>
            <option disabled selected value> -- Kies een optie --</option>
            <option>VWO</option>
            <option>HAVO</option>
            <option>MBO</option>
            <option>Anders</option></select>
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
        <button type="submit" class="btn btn-dark" id="Verzend">Verzenden</button>

</form>

</body>

</html>