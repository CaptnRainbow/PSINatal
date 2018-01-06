<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mod17";
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    $conn->set_charset('utf8');
    if($conn->connect_error) {
        DIE("A conexão falhou:".$conn->connect_error);
    }
    
    $sql = "select nome, utilizador_pk from utilizador";
    $result = $conn->query($sql);
    
    if($result->num_rows<=0) {
        echo("<script>alert('Não existem coordenadores!');</script>");   
    }
    
    $preencheCombo = array();
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $preencheCombo[] = $row;
    } 
    
   // $registoresultado = $result->fetch_assoc();
    
    $selectedRadio = $_POST["opts"];
    
    if($selectedRadio == "insert") {
        
        echo("<form method='POST'>");
            echo("<table>");
                echo("<tr><td> Sigla do departamento: <input type='text' name='deptsigla'> </td></tr>");
                echo("<tr><td>Nome do departamento: <input type='text' name='deptnome'></td></tr>");
                
                echo("<tr><td>");
                echo("Coordenador do departamento: <select name='comboCoordenador'>");
                    for($i=0; $i < count($preencheCombo); $i++){
                        echo("<option value='" . $preencheCombo[$i]["utilizador_pk"] . "'> ". $preencheCombo[$i]["nome"] ." </option> ");
                    }
                echo(" </select> </td></tr> ");

                echo("<tr><td>Observações: <input type='text' name='deptobs'></td></tr>");
                
                echo("</table>");
        
        echo("<input type='submit' name='btsub' value='Enviar'/>");
        echo("</form>");
       
        
        
        
    }
    
    if(isset($_POST['btsub'])) {
            
        /*  echo($_POST["deptsigla"]);
            echo($_POST["deptnome"]);
            echo($_POST["comboCoordenador"]);
            echo($_POST["deptobs"]); */
        
        $sqlInsert = "insert into departamento values('".$_POST['deptsigla']."','". $_POST['deptnome'] ."',". $_POST['comboCoordenador'] .",'".$_POST['deptobs']."')";
        
        $insert = $conn->query($sqlInsert);
        
        if($insert === true) {
            echo("<script>alert('Inserido com sucesso!');</script>");   
        }
    
        
    }
    
    
?>
