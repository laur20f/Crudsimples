<?php

require 'auth.php';

if (!isset($_GET['id'])) {
    header('location: home.php');
    exit();
}

$id = $_GET['id'];

$fp = fopen('filmes.csv', 'r');
$data = [];

while (($rom = fgetcsv($fp)) !== false) {
    if ($rom[0] == $id) {
        $data = $rom;
        break;
    }
}

if (sizeof($data) == 0) {
    header('location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <h1>Editar o Filme: <?= $data[1] ?></h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data[0] ?>">
        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo" required value="<?= $data[1] ?>">
        <label for="diretor">Diretor:</label>
        <input type="text" id="diretor" name="diretor"required value="<?= $data[2] ?>">
        <label for="genero">Genero:</label>
        <select required name="genero">
            <option value="Ação">AÇÃO</option>
            <option value="Drama">DRAMA</option>
            <option value="Comedia">COMEDIA</option>
        </select>
        <label for="classificacao">Classificação:</label>
        <input type="text" id="classificacao" name="classificacao"required value="<?= $data[4] ?>">
        <button>Editar</button>
    </form> <br>
<a href="home.php"><button>Voltar ao CRUD</button></a>
</body>

</html>