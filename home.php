<?php 
require 'auth.php';
// lembrar  de criar  mudar o nome do arquivo csv 
$fp = fopen('filmes.csv', 'r');
$id = uniqid();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Filmes tops</title>
</head>

<body>
    <h1 class="titulo" >Filmes Que Vale a Pena(e a galinha toda) Assistir</h1>

    <form action="create.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo" required>
        <label for="diretor">Diretor:</label>
        <input type="text" id="diretor" name="diretor" required>
        <label for="genero">Genero:</label>
        <select required name="genero">
            <option value="Ação">AÇÃO</option>
            <option value="Drama">DRAMA</option>
            <option value="Comedia">COMEDIA</option>
        </select>
        <label for="classificacao">Classificação:</label>
        <input type="text" id="classificacao" name="classificacao" required>
        <button>Adicionar </button>
    </form>

    <br>
    <div>
        <table>
            <tr>
                <th>Titulo </th>
                <th>Diretor</th>
                <th>genero</th>
                <th>classificação</th>
                <th>❌</th>
                <th>📝</th>
            </tr>
            <?php while (($rom = fgetcsv($fp)) !== false) : ?>
                <tr>
                    <!-- vai começar com 1, pq o 0 é o id -->
                    <td> <?= $rom[1] ?></td>
                    <td> <?= $rom[2] ?></td>
                    <td> <?= $rom[3] ?></td>
                    <td> <?= $rom[4] ?></td>
                    <td>
                        <form action="delete.php">
                            <input type="hidden" name="id" value="<?= $rom[0] ?>">
                            <button>Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="edit.php">
                            <input type="hidden" name="id" value="<?= $rom[0] ?>">
                            <button>Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile ?>
        </table>
        <a href="index.php"><button>Voltar para o inicio</button></a>
    </div>
</body>

</html>