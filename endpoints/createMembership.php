<?php
require('../baza/baza.php');
require('../klase/Membership.php');



$membership = new Membership($conn);

$membership->nameSurname = $_POST["nameSurname"];
$membership->email = $_POST["email"];
$membership->telephone = $_POST["telephone"];
$membership->membershipType = $_POST["membershipType"];
$membership->date =$_POST["date"];
$membership->trainerId = $_POST["trainerId"];


if ($membership->addMembership())
    echo "New membership is created!";
else
    echo "Error while adding a new membership!.";

$conn->close();