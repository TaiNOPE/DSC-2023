<?php
    error_reporting(0);
    require("../../../database/db.php");

    connect();

    $title = $_REQUEST['title'];
    $sql = "SELECT * FROM `books` WHERE `title` LIKE '{$title}%'";
    $response = $conn->query($sql);

    if ($response->num_rows > 0){
        $array;
        $counter = 0;
        while($row = $response->fetch_assoc()) {
            $array[$counter] = json_encode($row);
            $counter += 1;
        }
        echo(json_encode($array));
    }else{
        echo "{}";
    }

    $conn->close();
?>