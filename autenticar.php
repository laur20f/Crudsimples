<?php 

if(!isset($_POST['email']) || !isset($_POST['senha'])) {
    header('location: /'); 
    exit();
}

session_start();
$email = $_POST['email'];
$senha= $_POST['senha'];

$fp = fopen('users.csv', 'r');
while (($row =  fgetcsv($fp)) !== false) {
    if ($row[0] == $email && $row[1] == $senha) {
        $_SESSION['auth'] = true;
        header('location: home.php');
        exit();
    }
}

$_SESSION['auth'] = false;
header('location: /');
exit();

?>
