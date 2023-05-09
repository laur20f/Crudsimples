<?php 

require 'auth.php';

if(!isset($_GET['id'])) {
    header('location: home.php');
    exit();
}

$titulo = $_GET['id'];

$tempFile = tempnam(".", "");

$fpOriginal =  fopen("filmes.csv", "r");
$fpTemp = fopen($tempFile, 'w');

while (($row =  fgetcsv($fpOriginal)) !== false) {
    if($row[0] !== $titulo) {
        fputcsv($fpTemp, $row);
    }
}

fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'filmes.csv');

header('location: home.php');

?>