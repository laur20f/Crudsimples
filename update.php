<?php


require 'auth.php';

if(!isset($_POST['id']) || !isset($_POST['titulo']) || !isset($_POST['diretor']) || !isset($_POST['genero']) || !isset($_POST['classificacao'])) {
    header('location: home.php'); 
    exit();
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$diretor = $_POST['diretor'];
$genero = $_POST['genero'];
$classificacao = $_POST['classificacao'];

$tempFile = tempnam(".", "");

$fpOriginal =  fopen("filmes.csv", "r");
$fpTemp = fopen($tempFile, 'w');

while (($row =  fgetcsv($fpOriginal)) !== false) {
    if ($row[0] != $id) {
        fputcsv($fpTemp, $row);
        continue;
    }
    fputcsv($fpTemp, [$id, $titulo, $diretor, $genero, $classificacao]);
}

fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'filmes.csv');

header('location: home.php');