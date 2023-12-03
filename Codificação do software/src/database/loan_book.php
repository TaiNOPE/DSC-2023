<?php
    require("db.php");
    connect();
    session_start();

    $book_id = $_POST["book_id"];
    $reader_id = $_POST["reader_id"];
    $return_date = $_POST["return_date"];
    $librarian_id = $_SESSION["id"];
    $loan_date = date("d-m-y");


    $sqlBookId = "SELECT id FROM books WHERE id = '{$book_id}'";
    $sqlReaderId = "SELECT id FROM readers WHERE id = '{$reader_id}';";
    $sqlLibrarianId = "SELECT id FROM librarians WHERE id = '{$librarian_id}';";
    $sqlLoanedBook = "SELECT book_id FROM book_loans WHERE book_id = '{$book_id}';";

    $queryBookId = $conn->query($sqlBookId)->fetch_assoc();
    $queryReaderId = $conn->query($sqlReaderId)->fetch_assoc();
    $queryLibrarianId = $conn->query($sqlLibrarianId)->fetch_assoc();
    $queryLoanedBook = $conn->query($sqlLoanedBook)->fetch_assoc();

    $bookCanBeLoaned = true;
    if(!$queryBookId){
        echo("Livro com o ID informado não foi encontrado.<br>");
        $bookCanBeLoaned = false;
    }

    if(!$queryReaderId){
        echo("Leitor com o ID informado não foi encontrado.<br>");
        $bookCanBeLoaned = false;
    }

    if(!$queryLibrarianId){
        echo("Bibliotecário com o ID informado não foi encontrado. (se esse erro aparecer, alguma coisa deu mt errada kkkkkk).<br>");
        $bookCanBeLoaned = false;
    }

    if($queryLoanedBook){
        echo("O livro com o ID informado já está emprestado para um usuário.<br>");
        $bookCanBeLoaned = false;
    }

    if($bookCanBeLoaned){
        $queryLoan = "        
            INSERT INTO book_loans VALUES (DEFAULT, '{$librarian_id}', '{$reader_id}', '{$book_id}', '{$loan_date}', '{$return_date}');
        ";
        echo($queryLoan);
        echo("livro emprestado");
        $conn->query($queryLoan);
    }else{
        echo("Livro não não foi emprestado");
    }
?>