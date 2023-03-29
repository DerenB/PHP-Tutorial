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

?>