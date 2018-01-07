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
    
    $selectedRadio = $_POST["opts"];
    
    
 
    
    
    
    
    
     
     
        
            
    
    
    
    
        

    
    
    

    
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  
  <title>Gestão de Critérios de Avaliação</title>
  
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="menu.php">Bem-Vindo <?php echo $_COOKIE["name"]; ?></a>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Criterios">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion1">
            <span class="nav-link-text">Critérios de Avaliação</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
             <li>
              <a href="">Ver enviados</a>
            </li>
            <li>
              <a href="">Ver em falta</a>
            </li>
            <li>
              <a href="criteriospdisciplina.php" style="color:green">Enviar Critérios por Disciplina</a>
            </li>    
            <li>
              <a href="">Enviar por departamento</a> <!-- <a href="admindept.php">Administração de Departamentos</a> -->
            </li>
          </ul>
        </li>
        
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <span class="nav-link-text">Administração</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Tabelas</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="">Utilizador</a>
                </li>
                 <li>
                  <a href="admindept.php" style="color:green">Departamento</a>
                </li>
                 <li>
                  <a href="">Nivel de ensino</a>
                </li>
                 <li>
                  <a href="">Tipo de curso</a>
                </li>
                 <li>
                  <a href="">Disciplina</a>
                </li>
                 <li>
                  <a href="">Curso</a>
                </li>
                 <li>
                  <a href="">Cursos por ano letivo</a>
                </li>
                 <li>
                  <a href="">Disciplinas por curso</a>
                </li>
                 <li>
                  <a href="">Ano Letivo</a>
                </li>
               
          </ul>
           </li>
      </ul>
       
        </li>
   
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Links">
          <a class="nav-link" href="">
            <span class="nav-link-text">Definir parâmetros adicionais</span>
          </a>
             <a class="nav-link" href="">
            <span class="nav-link-text">Enviar email</span>
          </a>
        </li>
        
        
 
        
      </ul>
        
        
        
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Sair</a>
        </li>
      </ul>
    </div>
  </nav>
    
  <div class="content-wrapper">
    <div class="container-fluid">
      

      <div class="row">
          
      </div>
      <?php
            
            // sem valor
            
            if($selectedRadio == null) {
                
                echo("<script>setTimeout(\"location.href = 'admindept.php';\",0);</script>");
                
            }

            // Insert
      
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
            
            if(isset($_POST['btsub'])) {
                
                $sigla = $_POST["deptsigla"];
                $nome = $_POST["deptnome"];
                $coor = $_POST["comboCoordenador"];
                $obs = $_POST["deptobs"];
        
                $sqlInsert = "insert into departamento "
                           . "values('$sigla','$nome', $coor, '$obs', 1)";
        
                $insert = $conn->query($sqlInsert);
        
                if($insert === true) {
                    echo("<script>setTimeout(\"location.href = 'admindept.php';\",0);</script>");
                    echo("<script>alert('Inserido com sucesso!');</script>"); 
               } else {
                    echo("<script>alert('Registo não foi inserido com sucesso!');</script>");
               }
            }
            
            
            // Delete
            
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
    
            if(isset($_POST['btdel'])) {
                
                $sqlDel = "update departamento set ativo = 0 where departamento_pk = '".$_POST["comboDept"]."';";
        
                $delete = $conn->query($sqlDel);
                
                if($delete === true) {
                    echo("<script>setTimeout(\"location.href = 'admindept.php';\",0);</script>");
                    echo("<script>alert('Apagado com sucesso com sucesso!');</script>");   
                    
                }
            }
            
            //Update
            
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
                $tempDept = $_POST['comboDept'];
            
                $result = $conn->query($sql);
    
                if($result->num_rows<=0) {
                    echo("<script>alert('Não existem coordenadores!');</script>");   
                }
    
                $preencheUpd= $result->fetch_array();
                
                //".$_POST['comboDept']."
                
            
                echo("<form method='POST'");
                    echo("<table>");
                        echo("<tr><td>Sigla: <input type='text' name='sigla' value ='".$preencheUpd['departamento_pk']."' disabled > </td></tr>");
                        echo("<tr><td>Nome: <input type='text' name='nome' value ='".$preencheUpd['nome']."'> </td></tr>  ");
                        echo("<tr><td>");
                        echo("Coordenador do departamento: <select name='coord' value='".$preencheUpd['coordenador_fk']   ."'>");
                        for($i=0; $i < count($preencheUt); $i++){
                            echo("<option value='" . $preencheUt[$i]['utilizador_pk'] . "'> ". $preencheUt[$i]['nome'] ." </option> ");
                        }
                        echo(" </select> </td></tr> ");
                        echo("<tr><td>Observações: <input type='text' name='obs' value='".$preencheUpd['obs']."'> </td></tr>");
                    echo("</table>");
                    echo("<input type='submit' name='btupd1' value='Atualizar'/>");
                echo("</form>");
            } 
            
            if(isset($_POST["btupd1"])) {
                
                echo($preencheUpd['departamento_pk']);
                echo($_POST['comboDept']);
        
                $sql = "update departamento "
                        . "set nome ='".$_POST['nome']."', "
                        . "coordenador_fk =".$_POST['coord'].", "
                        . "obs = '".$_POST['obs']."' "
                        . "where departamento_pk = '".$preencheUpd['departamento_pk']."'";

                $result = $conn->query($sql);
        
                if($result === true) {
                    
                    echo("<script>alert('Atualizado com sucesso com sucesso!');</script>");
                    
                    echo($_POST['comboDept']);
                    echo($preencheUpd['departamento_pk']); echo("<br>");
                    echo($tempDept); echo("<br>");
                    echo($_POST['comboDept']); echo("<br>");
                    echo($_POST['nome']); echo("<br>");
                    
                    echo($sql); echo("<br>");
                    echo($conn->error); echo("<br>");
                   
                    
                } else {
                    echo("<script>alert('Nao foi');</script>");
                    echo($sql); echo("<br>");
                    echo($conn->error);
                }  
            }
            
            ?>
    </div>
    
   

  </div>
  

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione sair para acabar a sua sessão.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="index.php">Sair</a>
          </div>
        </div>
      </div>
    </div>
  
  
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
</body>

</html>
