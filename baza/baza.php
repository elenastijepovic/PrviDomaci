<?php

$server = "localhost:3307";
$user = "root";
$pass = "";
$base = "clanarine";


$conn = new mysqli($server, $user, $pass, $base);

if ($conn->connect_error) {
    echo "Greska prilikom konekcije!";
    die($conn->connect_error);
}