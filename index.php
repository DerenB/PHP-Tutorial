<?php

    // Connect to DataBase
    $connection = mysqli_connect('localhost', 'deren', '1234', 'ninja_pizza');

    // Test Connection
    // If unsuccessful, will resolve as true due to '!'
    if(!$connection) {
        echo 'Connection Error: ' . mysqli_connect_error();
    }

    // Query to retrieve ALL pizzas
    $sqlQueryAll = 'SELECT title, ingredients, id FROM pizzas';

    // Execute Query, get result
    $result = mysqli_query($connection, $sqlQueryAll);

    // Fetch the result rows as an array
    $pizzaResults = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free the result from memory
    // Not necessary but good practice
    mysqli_free_result($result);

    // Close connection to database
    mysqli_close($connection);

    // Test print
    print_r($pizzaResults);

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php') ?>

    <?php include('templates/footer.php') ?>
    
</html>


