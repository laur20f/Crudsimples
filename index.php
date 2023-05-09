<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes Que Vale a Pena(e a galinha toda) Assistir</title>
</head>

<body>
    <h1>Filmes</h1>

    <?php if (!isset($_SESSION['auth']) ||  $_SESSION['auth'] !== true) : ?>
        <h2>Autentique-se</h2>
        <form action="autenticar.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="EX: Email@gmail.com" required>
            <label for="senha">Senha:</label>
            <input type="senha" id="senha" name="senha" required>
            <button>Autenticar</button>
        </form>
        <?php else: ?>
        <h2>Você está logado</h2>
        <a href="home.php"><button>Ver</button></a>
        <br><br>
        <a href="logout.php"> <button>Sair</button></a>
    <?php endif ?>

</body>