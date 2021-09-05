<?php
require('../baza/baza.php');
require('../klase/Membership.php');

$membership = new Membership($conn);
$membership->id = $_POST['id'];
$membership->date = $_POST['date'];

if ($membership->update()) {
    echo "Experation date is changed!";
}



$conn->close();