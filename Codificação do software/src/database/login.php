<?php
    require("db.php");

    $cpf = $_POST["cpf"];
    $password = $_POST["password"];
    echo("cpf: {$cpf}<br>password: {$password}<br>");
    if($cpf == "" or $password == ""){ die("Credentials error"); }

    connect();

    // check credentials for reader
    $sqlReader = "select name, id from readers where(cpf = '{$cpf}' and password = '{$password}' and active = 1);";
    var_dump($sqlReader);
    $queryReader = $conn->query($sqlReader);
    if($queryReader && mysqli_num_rows($queryReader) > 0){
        $row = $queryReader->fetch_assoc();
        $name = $row["name"];
        session_start();
        $_SESSION["name"] = $name;
        $_SESSION["access"] = "reader";
        $_SESSION["id"] = $row["id"];
        echo("logged as {$name}");
        $conn->close();
        //header("location:../index.php");
        return;
    }


    // check credentials for librarian
    $sqlLibrarian = "select name, id from librarians where(cpf = '{$cpf}' and password = '{$password}' and active = TRUE);";
    var_dump($sqlLibrarian);
    $queryLibrarian = $conn->query($sqlLibrarian);
    if($queryLibrarian && mysqli_num_rows($queryLibrarian) > 0){
        $row = $queryLibrarian->fetch_assoc();
        $name = $row["name"];
        session_start();
        $_SESSION["name"] = $name;
        $_SESSION["access"] = "librarian";
        $_SESSION["id"] = $row["id"];
        echo("logged as {$name}");
        $conn->close();
        header("location:../index.php");
        return;
    }

    // check credentials for admin
    $sqlAdmin = "select name, id from admins where(cpf = '{$cpf}' and password = '{$password}' and active = TRUE);";
    var_dump($sqlAdmin);
    $queryAdmin = $conn->query($sqlAdmin);
    if($queryAdmin && mysqli_num_rows($queryAdmin) > 0){
        $row = $queryAdmin->fetch_assoc();
        $name = $row["name"];
        session_start();
        $_SESSION["name"] = $name;
        $_SESSION["access"] = "admin";
        $_SESSION["id"] = $row["id"];
        echo("logged as {$name}");
        $conn->close();
        header("location:../index.php");
        return;
    }


    $conn->close();
    header("location: ../pages/login/index.phtml");
?>