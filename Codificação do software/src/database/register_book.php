<?php
    //database connection
    require("db.php");
    connect();

    $title              = $_POST["title"];
    $author             = $_POST["author"];
    $year               = $_POST["year"];
    $volume             = $_POST["volume"];
    $edition            = $_POST["edition"];
    $series             = $_POST["series"];
    $collection         = $_POST["collection"];
    $collectionNumber   = $_POST["collection_number"];
    $isbn               = $_POST["isbn"];
    $quantity           = $_POST["quantity"];
    $isVisible          = ($_POST["visibility"] == "on")? 1 : 0;

    $title              = htmlspecialchars($title, ENT_QUOTES);
    $author             = htmlspecialchars($author, ENT_QUOTES);
    $year               = htmlspecialchars($year, ENT_QUOTES);
    $volume             = htmlspecialchars($volume, ENT_QUOTES);
    $edition            = htmlspecialchars($edition, ENT_QUOTES);
    $series             = htmlspecialchars($series, ENT_QUOTES);
    $collection         = htmlspecialchars($collection, ENT_QUOTES);
    $collectionNumber   = htmlspecialchars($collectionNumber, ENT_QUOTES);
    $isbn               = htmlspecialchars($isbn, ENT_QUOTES);
    //$quantity           = htmlspecialchars($quantity, ENT_QUOTES);

    $isFormValid = true;
    if($title == ""){ $isFormValid = false;}
    if($author == ""){ $isFormValid = false;}
    if($quantity == ""){ $quantity = 1;}
    
    $sql = "
        INSERT INTO books (title, author, year, volume, edition, series, collection, collection_number, isbn, isVisible) 
        VALUES ('{$title}', '{$author}', '{$year}', '{$volume}', '{$edition}', '{$series}', '{$collection}', '{$collectionNumber}', '{$isbn}', {$isVisible});
    ";

    var_dump($sql);

    $query = false;
    if($isFormValid){
        for($i = 0; $i < $quantity; $i++){  // very fucked up
            $query = $conn->query($sql);
        }
    }

    if($query){
        echo("Registered.<br>");
    }   else{
        echo("Not registered. Error: <br>");
    }

    $conn->close();
?>