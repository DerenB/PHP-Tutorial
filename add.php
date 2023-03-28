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
            echo 'An email is required <br />';
        } else {
            echo htmlspecialchars($_POST['email']);
        }

        // Check Title submission
        if(empty($_POST['title'])) {
            echo 'A title is required <br />';
        } else {
            echo htmlspecialchars($_POST['title']);
        }

        // Check Ingredients submission
        if(empty($_POST['ingredients'])) {
            echo 'An email is required <br />';
        } else {
            echo htmlspecialchars($_POST['ingredients']);
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


