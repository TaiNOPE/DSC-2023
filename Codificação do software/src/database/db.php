<?php
    const HOST_NAME     = "localhost";
    const SQL_USERNAME  = "root";
    const SQL_PASSWORD  = "";
    const DATABASE_NAME = "biblioteca_dsc";    

    global $conn;

    function connect(){
        global $conn;
        $conn = new mysqli(HOST_NAME, SQL_USERNAME, SQL_PASSWORD, DATABASE_NAME);
        if($conn->connect_error){ die("Connection error: " . $conn->connect_error); }
        echo("Connected.<br>");
    }
?>