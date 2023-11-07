<?php
    require("db.php");

    $username = $_POST["username"];
    $password = $_POST["password"];
    if($username == "" or $password == ""){ die("Credentials error"); }

    connect();

    $sql = "select * from login where(name = '" . $username . "' and password = '" . $password . "');";
    var_dump($sql . "<br>");
    $query = $conn->query($sql);
    if($query == true){
        $result = $query->fetch_assoc()['name'];
        echo("<br>");
        echo("Logged as <b>" . $result . "</br>");
        header("index.html");
    }   else{
        echo("Not registered. Error: <br>");
    }

    session_start();
    $_SESSION["nickname"] = $username;
    $conn->close();
    header("location:../index1.php");
?>