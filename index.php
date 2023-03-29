<?php

    // Database Connection
    include('config/db_connect.php');

    // Query to retrieve ALL pizzas
    $sqlQueryAll = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

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
    // print_r($pizzaResults);

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php') ?>

    <h4 class="center grey-text">Pizzas!</h4>

    <div class="container">
        <div class="row">

            <?php foreach($pizzaResults as $pizza): ?>

                <div class="col s6 m3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                                    <li><?php echo htmlspecialchars($ing); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="#">More Info</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <?php include('templates/footer.php') ?>
    
</html>


