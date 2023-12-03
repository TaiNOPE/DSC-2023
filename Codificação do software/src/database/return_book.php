<?php
    require("db.php");
    connect();
    session_start();

    $book_id = $_POST["book_id"];
    $librarian_id = $_SESSION["id"];

    $sqlLoanId = "SELECT id FROM book_loans WHERE book_id = '{$book_id}'";

    $queryLoanId = $conn->query($sqlLoanId)->fetch_assoc();

    if($queryLoanId){
        $queryLoan = "        
            DELETE FROM book_loans WHERE id = {$queryLoanId['id']};
        ";
        echo($queryLoan);
        echo("livro devolvido");
        $conn->query($queryLoan);
    }else{
        echo("Empréstimo não foi encontrado");
    }
?>