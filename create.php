<?php 

require 'auth.php';

if(!isset($_POST['id']) || !isset($_POST['titulo']) || !isset($_POST['diretor']) || !isset($_POST['genero']) || !isset($_POST['classificacao'])) {
    header('location: home.php'); 
    exit();
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$diretor= $_POST['diretor'];
$genero = $_POST['genero'];
$classificacao = $_POST['classificacao'];


$fp = fopen('filmes.csv', 'r');
while (($row =  fgetcsv($fp)) !== false) {
    if($row[1] == $titulo) {
        header('location: home.php');
        exit();
    }
}
$fp = fopen('filmes.csv', 'a');
fputcsv($fp, [$id, $titulo, $diretor, $genero, $classificacao]);

header('location: home.php');