<?php
        
        if ($_FILES["file"]["error"] > 0){
                echo "<SCRIPT>alert('Ocorreu um erro durante o envio! Por favor tente outra vez.');</SCRIPT>";
                echo "Return Code: ".$_FILES["file"]["error"]."<br>";
                    die('reciever.php');
                    header("Location:criteriospdisciplina6.php");                    
        }else{
               echo "Envio: ".$_FILES["file"]["name"]."<br>";
               echo "<SCRIPT>alert('Ficheiro Enviado com Sucesso!');</SCRIPT>"; 
            }
        if( $_FILES["file"]["type"]!=='doc' || 'docx' ||'pdf'){
                    echo"Erro! Só são permitidos ficheiros Word (.docx / .doc) ou PDF (.pdf)!"."<br>";
        }else{
            move_uploaded_file($_FILES["file"]["tmp_name"], $_COOKIE['anoletivocurr'] . "/" . date('Y-m-d@H:i:s') .$_COOKIE["userpk"] . "/ " . $_FILES["file"]["name"]);
            echo "Guardado como: "."upload/" . $_FILES["file"]["name"]."<br>";
        }
?>
