<?php 
include_once('connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
session_destroy();
unset($_SESSION['Email']) ; 
unset($_SESSION['ConsumerId']);

header('Location: Login.php');


?>
