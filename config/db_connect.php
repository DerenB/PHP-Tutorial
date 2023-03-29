<?php

// Connect to DataBase
$connection = mysqli_connect('localhost', 'deren', '1234', 'ninja_pizza');

// Test Connection
// If unsuccessful, will resolve as true due to '!'
if(!$connection) {
    echo 'Connection Error: ' . mysqli_connect_error();
}

?>