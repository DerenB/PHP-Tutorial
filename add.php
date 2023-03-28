<?php

    // Checks if a certain variable/value has been set
    // Form stores all variables in a GET variable, associative array
    // if(isset($_GET['submit'])) {
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    if(isset($_POST['submit'])) {

        // Check Email submission
        if(empty($_POST['email'])) {
            // Checks if email field is empty
            echo 'An email is required <br />';
        } else {
            $email = $_POST['email'];
            // Checks if it's a valid email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Email must be a valid email address';
            }
        }

        // Check Title submission
        if(empty($_POST['title'])) {
            // Checks if title field is empty
            echo 'A title is required <br />';
        } else {
            $title = $_POST['title'];
            // Checks if only letters and spaces are used
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                echo 'Title must be letters and spaces only';
            }
        }

        // Check Ingredients submission
        if(empty($_POST['ingredients'])) {
            // Checks if ingredients field is empty
            echo 'An ingredient list is required <br />';
        } else {
            $ingredients = $_POST['ingredients'];
            // Checks if the ingredients is a comma separated list
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                echo 'Ingredients must be a comma separated list';
            }
        }

    } // End of POST check


?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" class="white" method="POST">
            <label for="email">Your Email:</label>
            <input type="text" name="email">
            <label for="title">Pizza Title:</label>
            <input type="text" name="title">
            <label for="ingredients">Ingredients:</label>
            <input type="text" name="ingredients">
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>
    
</html>


