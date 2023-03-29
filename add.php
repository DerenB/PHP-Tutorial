<?php
    // Example of GET
    // Checks if a certain variable/value has been set
    // Form stores all variables in a GET variable, associative array
    // if(isset($_GET['submit'])) {
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    // Database Connection
    include('config/db_connect.php');

    // Initialize Variables
    $email = $title = $ingredients = '';

    // Array for Recording any Errors
    $errors = array(
        'email' => '',
        'title' => '',
        'ingredients' => ''
    );

    if(isset($_POST['submit'])) {

        // Check Email submission
        if(empty($_POST['email'])) {
            // Checks if email field is empty
            $errors['email'] = 'An email is required <br />';
        } else {
            $email = $_POST['email'];
            // Checks if it's a valid email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email must be a valid email address';
            }
        }

        // Check Title submission
        if(empty($_POST['title'])) {
            // Checks if title field is empty
            $errors['title'] = 'A title is required <br />';
        } else {
            $title = $_POST['title'];
            // Checks if only letters and spaces are used
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $errors['title'] = 'Title must be letters and spaces only';
            }
        }

        // Check Ingredients submission
        if(empty($_POST['ingredients'])) {
            // Checks if ingredients field is empty
            $errors['ingredients'] = 'An ingredient list is required <br />';
        } else {
            $ingredients = $_POST['ingredients'];
            // Checks if the ingredients is a comma separated list
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                $errors['ingredients'] = 'Ingredients must be a comma separated list';
            }
        }

        // Check if there are any errors
        // If there are no errors in the array, it will return False
        if(array_filter($errors)) {
            echo 'Errors in the form';
        } else {
            // echo 'Form is Valid';

            // Add data to database
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $title = mysqli_real_escape_string($connection, $_POST['title']);
            $ingredients = mysqli_real_escape_string($connection, $_POST['ingredients']);

            // Create SQL insert statement
            $sqlInsert = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

            // Save to Database and check
            if(mysqli_query($connection, $sqlInsert)) {
                // Success
                // Redirect user to given page
                header('Location: index.php');
            } else {
                // Error
                echo 'Query Error: ' . mysqli_error($connection);
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
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>

            <label for="title">Pizza Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>

            <label for="ingredients">Ingredients:</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>
    
</html>


