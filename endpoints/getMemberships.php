<?php
require('../baza/baza.php');
require('../klase/Membership.php');




$membership = new Membership($conn);

$membership->order_by = $_GET["order_by"];

//PROMENI LOADLETOVI
echo json_encode($membership->loadMemberships());


$conn->close();