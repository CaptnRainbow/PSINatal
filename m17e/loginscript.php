<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mod17";
   
    $utname = $_POST["username"];
    $utpass = $_POST["password"];
    
    $sql = "SELECT * FROM `utilizador` WHERE `nome_acesso`='".$utname."' AND `psw`='".$utpass."'";
    $conn = new mysqli($servername,$username,$password,$dbname);
    $conn->set_charset('utf8');
    if($conn->connect_error) {
        DIE("A conexão falhou:".$conn->connect_error);
    }
    
    $result = $conn->query($sql);
    $registoresultado = $result->fetch_assoc();
    
    if($result->num_rows>0){
        setcookie("name",$registoresultado["nome"]);
        header("Location: http://" .$_SERVER['HTTP_HOST']. "/m17e/menu.php");
    } else {
        $mensagem = "Utilizador ou Palavra-Passe errada! Tente outra vez.";
        echo("<script>alert('$mensagem');</script>");
        echo("<script>setTimeout(\"location.href = 'index.php';\",0);</script>");
        $conn->close();
    }
?>

    