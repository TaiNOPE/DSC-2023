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
            <p>Emprestar livro</p>
        </header>

        <main>
            <form method="POST" action = "../../database/loan_book.php">
                <label>ID do livro</label>
                <input type="text" placeholder="" name="book_id">
                <label>ID do usuário</label>
                <input type="text" placeholder="" name="reader_id">
                <label>Data de devolução</label>
                <input type="date" placeholder="********" name="return_date">
                <input type="submit" value="Continuar">
            </form>
        </main>
    </body>
</html>