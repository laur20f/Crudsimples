<?php 

session_start();

$_SESSION['auth'] = false;
session_destroy();

header('location: /')
?>