<?php
require('../baza/baza.php');
require('../klase/Membership.php');



$membership = new Membership($conn);
$membership->order_by = $_GET["order_by"];

echo json_encode($membership->loadSoonExpired());


$conn->close();