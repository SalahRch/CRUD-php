<?php

$conn = mysqli_connect("localhost", "root", "", "tp4");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

