<?php
    //database connection
    require("db.php");

    $name               = $_POST["name"];
    $cpf                = $_POST["cpf"];
    $birth_date         = $_POST["birth_date"];
    $address            = $_POST["address"];
    $phone              = $_POST["phone"];
    $email              = $_POST["email"];
    $password           = $_POST["password"];
    $confirm_password   = $_POST["confirm_password"];

    $name               = htmlspecialchars($name, ENT_QUOTES);
    $cpf                = htmlspecialchars($cpf, ENT_QUOTES);
    $birth_date         = htmlspecialchars($birth_date, ENT_QUOTES);
    $address            = htmlspecialchars($address, ENT_QUOTES);
    $phone              = htmlspecialchars($phone, ENT_QUOTES);
    $email              = htmlspecialchars($email, ENT_QUOTES);
    //$password           = htmlspecialchars($password, ENT_QUOTES);
    //$confirm_password   = htmlspecialchars($confirm_password, ENT_QUOTES);

    $isFormValid = true;
    if($name == ""){ $isFormValid = false;}
    if($cpf == ""){ $isFormValid = false;}
    if($birth_date == ""){ $isFormValid = false;}
    if($address == ""){ $isFormValid = false;}
    if($phone == ""){ $isFormValid = false;}
    if($email == ""){ $isFormValid = false;}
    if($password == ""){ $isFormValid = false;}
    if($confirm_password == ""){ $isFormValid = false;}
    if($password != $confirm_password){ $isFormValid = false; }

    if(!$isFormValid){
        echo("formulario invalido");
        return;
    }

    connect();

    $sql = "
        INSERT INTO readers (name, cpf, birth_date, address, phone, email, password) 
        VALUES ('{$name}', '{$cpf}', '{$birth_date}', '{$address}', '{$phone}', '{$email}', '{$password}');
    ";

    var_dump($sql);

    $query = $conn->query($sql);

    if($query){
        echo("Registered.<br>");
    }   else{
        echo("Not registered. Error: <br>");
    }

    $conn->close();
?>