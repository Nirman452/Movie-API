<?php 
session_start();
session_destroy();
if (isset($_COOKIE['token'])) {
    unset($_COOKIE['token']); 
    setcookie('token', null, -1, '/');
}
header('Location: ../../index.php');