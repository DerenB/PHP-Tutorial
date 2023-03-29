<?php

    // Ternary Operator
    $score = 20;
    $val = $score > 40 ? 'High Score' : 'Low Score';
    echo $val . '<br />';

    // Super Globals
    echo $_SERVER['SERVER_NAME'] . '<br />';
    echo $_SERVER['REQUEST_METHOD'] . '<br />';
    echo $_SERVER['SCRIPT_FILENAME'] . '<br />';
    echo $_SERVER['PHP_SELF'] . '<br />';

    // Session
    if(isset($_POST['submit'])) {
        // start the session
        session_start();

        // Add variable values to the super global
        $_SESSION['name'] = $_POST['name'];

        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="name">
        <input type="submit" name="submit" value="submit">
    </form>

    </body>
</html>