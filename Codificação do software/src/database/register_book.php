<?php
    require("db.php");

    connect(); // magic function

    $title      = $_POST["book_title"];
    $author     = $_POST["book_author"];
    $quantity   = $_POST["book_quantity"];
    $isVisible  = (isset($_POST["book_visibility"]) and $_POST["book_visibility"] == "on")? "true" : "false"; // it likes to spit warnings sometimes

    $sql = "INSERT INTO books (title, author, isVisible) VALUES ('" . $title . "', '".  $author . "', " . $isVisible . ");";
    var_dump($sql);

    // very funny when ($quantity == 1000000000000000000)
    for($i = 0; $i < $quantity; $i++){
        $query = $conn->query($sql);
    }

    if($query == true){
        echo("Registered.<br>");
    }   else{
        echo("Not registered. Error. <br>");    // "error" 😎👍
    }

    $conn->close();
?>