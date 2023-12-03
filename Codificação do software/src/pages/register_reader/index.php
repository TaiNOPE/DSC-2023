<!DOCTYPE HTML>
<meta charset="UTF-8">

<html lang="pt-br">
    <header>
        <title>Teste</title>
        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="css/register_reader.css">
        <script src="js/register_book.js"></script>
    </header>

    <body>
        <header class="secondary">
            <p>Cadastrar leitor</p>
        </header>

        <main>
            <form method="POST" action="../../database/register_reader.php">
                <label>Nome completo</label>
                <input type="text" placeholder="" name="name">
                <label>CPF</label>
                <input type="text" placeholder="XXX.XXX.XXX-XX" name="cpf">
                <label>Data de nascimento</label>
                <input type="date" placeholder="" name="birth_date">
                <label>Endereço</label>
                <input type="text" placeholder="" name="address">
                <label>Telefone</label>
                <input type="text" placeholder="" name="phone">
                <label>E-Mail</label>
                <input type="text" placeholder="" name="email">
                <label>Senha</label>
                <input type="password" placeholder="********" name="password">
                <label>Repetir Senha</label>
                <input type="password" placeholder="********" name="confirm_password">
                <input type="submit" value="Continuar">
            </form>
        </main>
    </body>
</html>