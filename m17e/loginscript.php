<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mod17";
   
    $utname = $_POST["username"];
    $utpass = $_POST["password"];
    
    $sql = "select * from utilizador where nome_acesso='".$utname."' and psw='".$utpass."'";
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error) {
        DIE("Connection failed:".$conn->connect_error);
    }
    
    $result = $conn->query($sql);
    
    if($result->num_rows>0) {
        $_SESSION["user"] = $result->fetch_assoc();
        header("Location: menu.php");
    } else {
        header("Location: index.php");
        $conn->close();
    }
  
?>

    