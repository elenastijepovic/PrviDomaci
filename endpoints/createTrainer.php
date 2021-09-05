<?php
require('../baza/baza.php');
require('../klase/Trainer.php');

$trainer = new Trainer($conn);


$trainer->nameSurname = $_POST["nameSurname"];
$trainer->specialization = $_POST["specialization"];;

if ($trainer->addTrainer()) {
    echo "You have successfully added a new trainer!";
} else {
    echo "Nije uspesno dodat trener (mozda vec postoji u bazi)";
}


$conn->close();