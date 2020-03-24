<?php

session_start();

if(isset($_SESSION['login']))
{
    $_SESSION = array();
    session_destroy();
}

header("Location:../vista/login.php");

?>
