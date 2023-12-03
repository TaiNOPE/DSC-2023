<!DOCTYPE HTML>
<meta charset="UTF-8">

<html lang="pt-br">
    <header>
        <title>Teste</title>
        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="css/loan_book.css">
        <script src="js/loan_book.js"></script>
    </header>

    <body>
        <header class="secondary">
            <p>Devolver livro</p>
        </header>

        <main>
            <form method="POST" action = "../../database/return_book.php">
                <label>ID do livro emprestado</label>
                <input type="text" placeholder="" name="book_id">
                <input type="submit" value="Continuar">
            </form>
        </main>
    </body>
</html>