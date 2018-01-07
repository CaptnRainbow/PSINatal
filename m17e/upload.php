<?php
    $target_dir = $_COOKIE['anoletivocurr']."/";
    $target_file = $target_dir . $_COOKIE['nivel'] . $_COOKIE['tipo'] . $_COOKIE['curso'] . $_COOKIE['disciplina'];
    $uploadOk = 1;
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(isset($_POST["submit"])) {
        $check = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
        if($check == "application/pdf" || $check == "application/msword" || $check == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {  
            $uploadOk = 1;
           // if($check == "application/msword" || $check == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
            //    
            //}
            
        } else {
            echo "Só é permitido o envio de ficheiros Word ou PDF! Por favor envie um ficheiro válido.";
            $uploadOk = 0;
        }
    }
/*
    $target_dir = $_COOKIE['anoletivocurr']."/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $filenametobe = $target_dir . $_COOKIE['nivel'] . $_COOKIE['tipo'] . $_COOKIE['curso'] . $_COOKIE['disciplina'];
    $uploadOk = 1;
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = mime_content_type($_FILES["fileToUpload"]["name"]);
        if($check == "application/pdf" || $check == "application/msword" || $check == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {  
            $uploadOk = 1;
           // if($check == "application/msword" || $check == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
            //    
            //}
            if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path)) {
                move_uploaded_file($_FILES["file"]["tmp_name"]," . $target_dir. " . $filenametobe);
          } else{
              echo "There was an error uploading the file, please try again!";
          }
        } else {
            echo "Só é permitido o envio de ficheiros Word ou PDF! Por favor envie um ficheiro válido.";
            $uploadOk = 0;
        }
    }

 */ 
?>
