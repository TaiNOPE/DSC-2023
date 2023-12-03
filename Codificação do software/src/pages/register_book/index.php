<?php
    session_start();
    if(!isset($_SESSION["access"]) || $_SESSION['access'] != "librarian"){
        header("Location: ../login/index.phtml");
    }
?>

<!DOCTYPE HTML>
<meta charset="UTF-8">

<html lang="pt-br">
    <header>
        <title>Teste</title>
        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="css/register_book.css">
        <script src="js/register_book.js"></script>
    </header>

    <body>
        <header class="secondary">
            <p>Cadastrar livro</p>
            <p><?php echo("Logado como {$_SESSION["name"]} ({$_SESSION["access"]})"); ?></p>
        </header>

        <main>
            <form method="POST" action="../../database/register_book.php">
                <label>Título</label>
                <input type="text" placeholder="" name="title">
                <label>Autor</label>
                <input type="text" placeholder="<desconhecido>" name="author">
                <label>Ano de publicação</label>
                <input type="number" placeholder="<desconhecido>" name="year">
                <label>Volume</label>
                <input type="number" placeholder="<desconhecido>" name="volume">
                <label>Edição</label>
                <input type="number" placeholder="<desconhecido>" name="edition">
                <label>Série</label>
                <input type="text" placeholder="<desconhecido / sem série>" name="series">
                <label>Coleção</label>
                <input type="text" placeholder="<desconhecido / sem coleção>" name="collection">
                <label>Número da coleção</label>
                <input type="text" placeholder="<desconhecido / sem coleção>" name="collection_number">
                <label>ISBN</label>
                <input type="text" placeholder="<desconhecido / não possui>" name="isbn">
                <label>Quantidade de exemplares</label>
                <input type="number" placeholder="1" name="quantity">
                <label>Visível?</label>
                <input type="checkbox" placeholder="" name="visibility" checked>
                <input type="submit" value="Continuar">
            </form>
        </main>
    </body>
</html>