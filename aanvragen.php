<!DOCTYPE html>
<html>

<head>

    <title>Brochure aanvraag</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <?php include ("header.php");

    ?>

</head>

<body>

<form>
    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Persoonlijke gegevens</h4>
        <label for="Voornaam">Voornaam*</label>
        <input type="text" class="form-control" id="Voornaam" placeholder="Vul voornaam in...">
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="Tussenvoegsels">Tussenvoegsels</label>
        <input type="text" class="form-control" id="Tussenvoegsesls" placeholder="(optioneel)">
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="Achternaam">Achternaam*</label>
        <input type="text" class="form-control" id="Achternaam" placeholder="Vul achternaam in...">
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="eMailadres">E-Mailadres*</label>
        <input type="email" class="form-control" id="eMailadres" placeholder="Vul e-mailadres in...">
    </div>

</form>

<form>
    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Vooropleiding</h4>
        <label for="Opleiding">Opleiding*</label>
        <input type="text" class="form-control" id="Opleiding" placeholder="Vul je opleiding in...">
    </div>

    <div class="container col-md-4 col-md-offset-4 my-4">
        <label for="verwachtAfstudeerJaar">(verwacht) Afstudeerjaar*</label>
        <select class="form-control" id="verwachtAfstudeerJaar">
            <option>2020</option>
            <option>2019</option>
            <option>2018</option>
            <option>Al afgestudeerd</option></select>
    </div>
</form>

<form>
    <div class="container col-md-4 col-md-offset-4 my-4">
        <h4>Kies de gewenste opleiding</h4>
        <p><b>ICT</b></p>
        <input type="radio" class="form-check-input" id="hboIct">
        <label class="form-check-label" for="hboIct">De enige opleiding die er toe doet, HBO-ICT</label>
    </div>
</form>

<form>
    <div class="container col-md-4 col-md-offset-4 my-4">
        <button type="submit" class="btn btn-dark">Verzend</button>

</form>

</body>

</html>