<?php 
    session_start();
    $user = $_SESSION['login'];
    session_destroy();
    
    header("Location: index.html");
    exit;

?>