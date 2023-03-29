<?php

    // Database Connection
    include('config/db_connect.php');

    // Check GET request id parameter
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($connection, $_GET['id']);

        // Make SQL for query
        $sqlQuery = "SELECT * FROM pizzas WHERE id = $id";

        // Get the Query result
        $result = mysqli_query($connection, $sqlQuery);

        // Fetch the Result
        $pizza = mysqli_fetch_assoc($result);

        // Free the result from memory
        mysqli_free_result($result);

        // Close the connection
        mysqli_close($connection);
    }

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>

    <div class="container center">
        <?php if($pizza): ?>

            <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
            <p>Created By: <?php echo htmlspecialchars($pizza['email']); ?></p>
            <p><?php echo date($pizza['created_at']); ?></p>
            <h5>Ingredients:</h5>
            <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

        <?php else: ?>

            <h5>No such Pizza exists.</h5>

        <?php endif; ?>
    </div>

    <?php include('templates/footer.php') ?>
</html>