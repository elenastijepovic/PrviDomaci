<?php
require('../baza/baza.php');
require('../klase/Trainer.php');

$trainer = new Trainer($conn);


echo json_encode($trainer->loadTrainers());


$conn->close();