<?php
    //database connection
    require("db.php");
    connect();

    $id                 = $_POST["id"];
    $title              = $_POST["title"];
    $author             = $_POST["author"];
    $year               = $_POST["year"];
    $volume             = $_POST["volume"];
    $edition            = $_POST["edition"];
    $series             = $_POST["series"];
    $collection         = $_POST["collection"];
    $collectionNumber   = $_POST["collection_number"];
    $isbn               = $_POST["isbn"];
    $isVisible          = ($_POST["visibility"] == "on")? "true" : "false"; // likes to spit warnings sometimes

    $title              = htmlspecialchars($title, ENT_QUOTES);
    $author             = htmlspecialchars($author, ENT_QUOTES);
    $year               = htmlspecialchars($year, ENT_QUOTES);
    $volume             = htmlspecialchars($volume, ENT_QUOTES);
    $edition            = htmlspecialchars($edition, ENT_QUOTES);
    $series             = htmlspecialchars($series, ENT_QUOTES);
    $collection         = htmlspecialchars($collection, ENT_QUOTES);
    $collectionNumber   = htmlspecialchars($collectionNumber, ENT_QUOTES);
    $isbn               = htmlspecialchars($isbn, ENT_QUOTES);

    // [form validation goes here]

    $sql = "
        UPDATE books
        SET title = '{$title}', author = '{$author}', year = '{$year}', volume = '{$volume}', edition = '{$edition}', series = '{$series}', collection = '{$collection}', collection_number = '{$collectionNumber}', isbn = '{$isbn}', isVisible = {$isVisible}
        WHERE id = {$id};
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