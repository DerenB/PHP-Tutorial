<?php

    // Start the session
    // have to start the session every time it is started
    session_start();

    // Delete session variable
    if($_SERVER['QUERY_STRING'] == 'noname') {
        // Removes a single session variable
        unset($_SESSION['name']);

        // Removes all session variables
        session_unset();
    }

    // assign session variable
    // Sets the variable equal to the name or to guest
    // If name doesn't exist or returns false, it returns guest (Default value)
    $name = $_SESSION['name'] ?? 'Guest';

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Pizza</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .brand {
            background: #cbb09c !important;
        }
        .brand-text {
            color: #cbb09c !important;
        }
        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .pizza {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
    </style>
</head>

<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Ninja Pizza</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text">Hello <?php echo htmlspecialchars($name); ?></li>
                <li>
                    <a href="add.php" class="btn brand z-depth-0">Add a Pizza</a>
                </li>
            </ul>
        </div>
    </nav>