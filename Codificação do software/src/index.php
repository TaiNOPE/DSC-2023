<!DOCTYPE HTML>
<meta charset="UTF-8">

<html lang="pt-br">
    <header>
        <p>
            <?php
                session_start();
                if(!isset($_SESSION["name"]) || $_SESSION["name"] == ""){
                    echo("
                        <p>Usuário não logado</p>
                        <a href='pages/login/index.phtml'> Login </a>
                    ");
                    return;
                }
                echo("
                        <p>Logado como <b>{$_SESSION['name']}</b>; Nível de acesso: <b>{$_SESSION["access"]}</b></p>
                        <a href='nukeSession.php'>Sair</a>
                    ");
                //echo('<a href="nukeSession.php">nuke session</a>');
            ?>
        </p>
    </header>

    <body>
        <?php
            switch ($_SESSION["access"]){
                case 'reader':
                    echo('
                        <a href="pages/register_book/index.php"> Renovar livro emprestado </a>
                        <br>
                        <a href="pages/register_book/index.php"> Consultar livros emprestados </a>
                        <br>
                        <a href="pages/register_book/index.php"> Abrir ticket de suporte </a>
                        <br>
                        <a href="pages/register_book/index.php"> Visualizar hostórico de empréstimos </a>
                        <br>
                    ');
                    break;
                    
                case 'librarian':
                    echo('
                        <a href="pages/register_book/index.php"> Cadastrar livro </a>
                        <br>
                        <a href="pages/register_reader/index.php"> Cadastrar leitor </a>
                        <br>
                        <a href="pages/alter_book/index.phtml"> Alterar livro </a>
                        <br>
                        <a href="pages/loan_book/index.php"> Emprestar livro </a>
                        <br>
                        <a href="pages/return_book/index.php"> Devolver Livro </a>
                        <br>
                    ');
                    break;
                
                case 'admin':
                    break;
            }
        ?>
    </body>
</html>