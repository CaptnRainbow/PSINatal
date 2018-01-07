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
        $preencheUt[] = $row;
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
                    for($i=0; $i < count($preencheUt); $i++){
                        echo("<option value='" . $preencheUt[$i]['utilizador_pk'] . "'> ". $preencheUt[$i]['nome'] ." </option> ");
                    }
                echo(" </select> </td></tr> ");

                echo("<tr><td>Observações: <input type='text' name='deptobs'></td></tr>");
                
                echo("</table>");
        
        echo("<input type='submit' name='btsub' value='Enviar'/>");
        echo("</form>");
    }
    
    if($selectedRadio == "delete") {
        
        $sqlCombo = "select departamento_pk, nome from departamento where ativo = 1";
        
        $resultCombo = $conn->query($sqlCombo);
        if($resultCombo->num_rows<=0) {
            echo("<script>alert('Não existem departamentos!');</script>");
        }
        
        $preenche = array();
        while($row = $resultCombo->fetch_array(MYSQLI_ASSOC)){
            $preenche[] = $row;
        } 
        
        echo("<form method='POST'>");
        
        echo("Departamentos: <select name='comboDept'>");
            for($i = 0; $i < count($preenche); $i++) {
                echo("<option value='". $preenche[$i]['departamento_pk'] ."'>". $preenche[$i]['nome']."</option>");
            }
        echo("</select>");
        
        echo("<input type='submit' name='btdel' value='Apagar'/>");
            
        echo("</form>");
        
    }
    
    if($selectedRadio == "update") {
        
        $sqlCombo = "select departamento_pk, nome from departamento where ativo = 1";
        
        $resultCombo = $conn->query($sqlCombo);
        if($resultCombo->num_rows<=0) {
            echo("<script>alert('Não existem departamentos!');</script>");
        }
        
        $preenche = array();
        while($row = $resultCombo->fetch_array(MYSQLI_ASSOC)){
            $preenche[] = $row;
        } 
        
        echo("<form method='POST'>");
        
        echo("Departamento para atualizar: <select name='comboDept'>");
            for($i = 0; $i < count($preenche); $i++) {
                echo("<option value='". $preenche[$i]['departamento_pk'] ."'>". $preenche[$i]['nome']."</option>");
            }
        echo("</select>");
        
        echo("<input type='submit' name='btupd' value='Atualizar'/>");
            
        echo("</form>");
        
    }
    
        if(isset($_POST['btupd'])) {
            
            $sql = "select * from departamento where departamento_pk = '". $_POST['comboDept'] ."'";
            
            $result = $conn->query($sql);
    
            if($result->num_rows<=0) {
                echo("<script>alert('Não existem coordenadores!');</script>");   
            }
    
            $preencheUpd= $result->fetch_array();
            
            echo("<form method='POST'");
                echo("<table>");
                    echo("<tr><td>Sigla: <input type='text' name='sigla' placeholder =".$preencheUpd['departamento_pk']."  > </td></tr>");
                    echo("<tr><td>Nome: <input type='text' name='nome' placeholder =".$preencheUpd['nome']."> </td></tr>  ");
                    echo("<tr><td>");
                    echo("Coordenador do departamento: <select name='coord'>");
                    for($i=0; $i < count($preencheUt); $i++){
                        echo("<option value='" . $preencheUt[$i]['utilizador_pk'] . "'> ". $preencheUt[$i]['nome'] ." </option> ");
                    }
                    echo(" </select> </td></tr> ");
                    echo("<tr><td>Observações: <input type='text' name='obs' placeholder=".$preencheUpd['obs']."> </td></tr>");
    } 
            
    
    
    
    
        
      if(isset($_POST['btdel'])) {
            
        
        
      $sqlDel = "update departamento set ativo = 0 where departamento_pk = '".$_POST["comboDept"]."';";
        
        $delete = $conn->query($sqlDel);
        if($delete === true) {
            echo("<script>alert('Apagado com sucesso com sucesso!');</script>");   
        //    echo($_POST["comboDept"]);
         //   echo("<script>setTimeout(\"location.href = 'index.php';\",0);</script>");
        }
    
        
    }
    
    
    
    if(isset($_POST['btsub'])) {
            
          echo($_POST["deptsigla"]); echo("<br>");
            echo($_POST["deptnome"]);echo("<br>");
            echo($_POST["comboCoordenador"]);echo("<br>");
            echo($_POST["deptobs"]);echo("<br>");
            
            $sigla = $_POST["deptsigla"];
            $nome = $_POST["deptnome"];
            $coor = $_POST["comboCoordenador"];
            $obs = $_POST["deptobs"];
        
        $sqlInsert = "insert into departamento "
                    . "values('$sigla','$nome', $coor, '$obs', 1)";
        
        $insert = $conn->query($sqlInsert);
        
        if($insert === true) {
            echo("<script>alert('Inserido com sucesso!');</script>");   
        } else {
            echo("<script>alert('Nao foi');</script>");
            echo($sqlInsert); echo("<br>");
            echo($conn->error);
        }
    
        
    }
    
    
?>
