<?php
require('../baza/baza.php');
require('../klase/Membership.php');

$membership = new Membership($conn);
$membership->id = $_POST['id'];

//PROMENI IZBRISILETID
echo json_encode($membership->deleteMembershipByID());




$conn->close();