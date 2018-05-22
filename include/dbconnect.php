<?php

$voornaam = filter_input(INPUT_POST, 'Voornaam');
$tussenvoegsels = filter_input(INPUT_POST, 'Tussenvoegsels');
$achternaam = filter_input(INPUT_POST, 'Achternaam');
$email = filter_input(INPUT_POST, 'email');
$opleiding = filter_input(INPUT_POST, 'Opleiding');
$afstudeerjaar = filter_input(INPUT_POST, 'verwachtAfstudeerJaar');

$server = '172.16.1.7';
$username = 'brochuredb';
$password = 'Groep4!';
$dbName = 'brochuredb';

$conn = mysqli_connect($server, $username, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//if(isset($_POST['Verzend'])){

    $sql = "INSERT INTO form (voornaam, tussenvoegsel, achternaam, email, opleiding, afstudeerjaar)
VALUES ($voornaam, $tussenvoegsels, $achternaam, $email, $opleiding, $afstudeerjaar)";


$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssss', $voornaam, $tussenvoegsels, $achternaam, $email, $opleiding, $afstudeerjaar);

$voornaam = $_POST['Voornaam'];
$tussenvoegsels = $_POST['Tussenvoegsels'];
$achternaam = $_POST['Achternaam'];
$email = $_POST['email'];
$opleiding = $_POST['Opleiding'];
$afstudeerjaar = $_POST['verwachtAfstudeerJaar'];
$stmt->execute();

if(mysqli_query($conn, $sql)){
    echo "";
} else{
    echo "" . mysqli_error($conn);
}

$stmt->close();
mysqli_close($conn);


//<?php
//
//$voornaam = filter_input(INPUT_POST, 'Voornaam');
//$tussenvoegsels = filter_input(INPUT_POST, 'Tussenvoegsels');
//$achternaam = filter_input(INPUT_POST, 'Achternaam');
//$email = filter_input(INPUT_POST, 'email');
//$opleiding = filter_input(INPUT_POST, 'Opleiding');
//$afstudeerjaar = filter_input(INPUT_POST, 'verwachtAfstudeerJaar');
//
//$server = '172.16.1.7';
//$username = 'brochuredb';
//$password = 'Groep4!';
//$dbName = 'brochuredb';
//
//$conn = mysqli_connect($server, $username, $password, $dbName);
//
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//
//if(isset($_POST['Verzend'])){
//
//    $sql = "INSERT INTO form (voornaam, tussenvoegsel, achternaam, email, opleiding, afstudeerjaar)
//VALUES ('$voornaam', '$tussenvoegsels', '$achternaam', '$email', '$opleiding', '$afstudeerjaar')";
//}
//
//if(mysqli_query($conn, $sql)){
//    echo "";
//} else{
//    echo "" . mysqli_error($conn);
//}
//
//mysqli_close($conn);





