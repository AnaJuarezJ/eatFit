<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/eatFit/home.php");
?>