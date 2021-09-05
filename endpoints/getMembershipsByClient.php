<?php
require('../baza/baza.php');
require('../klase/Membership.php');



$membership = new Membership($conn);
$membership->email = $_GET["email"];
$membership->order_by = $_GET["order_by"];

echo json_encode($membership->loadMembershipsForClient());


$conn->close();