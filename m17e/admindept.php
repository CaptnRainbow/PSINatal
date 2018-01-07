
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
     $servername = "localhost";
                 $username = "root";
                 $password = "";
                 $dbname = "mod17";

                 $sql = "SELECT `data_inicio`, `data_fim` FROM `ano_letivo` ORDER BY `ano_letivo_pk` DESC LIMIT 1";
                 $conn = new mysqli($servername,$username,$password,$dbname);
                 $conn->set_charset('utf8');

                 $result = $conn->query($sql);
                 $registoresultado = $result->fetch_row();  
                 $stringanoletivo = "". substr($registoresultado[0],0,4) . " - "  . substr($registoresultado[1],0,4);
                 echo("<h1>Ano Letivo " . $stringanoletivo . "</h1><br/><br/><br/>");
     ?>
          
    <div class='btn-group' data-toggle='buttons'>
        <form id="form-id" action="opsdept.php" method="POST">
            <table>
                <tr>
                    <td>
                        <label class="btn btn-dark">
                            <input type="radio" name="opts" value="insert"> Inserir
                        </label>
                    </td>
                    <td>
                        <label class="btn btn-dark">
                            <input type="radio" name="opts" value="update"> Atualizar
                        </label>
                    </td>
                    <td>
                        <label class="btn btn-dark">
                            <input type="radio" name="opts" value="delete"> Apagar
                        </label>
                    </td>
                </tr>
            </table>
            <!--<input name="btSubmit" type="submit" class="btn btn-dark btn-lg btn-block" value="Escolher"/>-->
            <button onclick="document.getElementById('form-id').submit();">Seguinte</button>
        </form>
</div>
      
    </div>
    
            <?php
            /*  $servername = "localhost";
                 $username = "root";
                 $password = "";
                 $dbname = "mod17";

                 $sql = "SELECT `data_inicio`, `data_fim` FROM `ano_letivo` ORDER BY `ano_letivo_pk` DESC LIMIT 1";
                 $conn = new mysqli($servername,$username,$password,$dbname);
                 $conn->set_charset('utf8');

                 $result = $conn->query($sql);
                 $registoresultado = $result->fetch_row();  
                 $stringanoletivo = "". substr($registoresultado[0],0,4) . " - "  . substr($registoresultado[1],0,4);
                 echo("<h1>Ano Letivo " . $stringanoletivo . "</h1><br/><br/><br/>");
                 
                 echo("<div class='btn-group' data-toggle='buttons'>");
                 
                    echo("<form action='opsdept.php' method='POST'>"
                           ."<table>"
                               . "<tr><td width='300'> <input style='width:100%' type='submit' class='btn btn-dark' name='delete' value='Apagar' />   </td>"
                               . "<td width='300'> <input style='width:100%' type='submit' class='btn btn-dark' name='insert' value='Inserir' />   </td>"
                               . "<td width='300'> <input style='width:100%' type='submit' class='btn btn-dark' name='update' value='Atualizar' />   </td></tr>"
                               //<input type="submit" class="button" name="insert" value="insert" />
                               //<button style='width:100%' type=button class='btn btn-dark'>Apagar</button>
                            
                            . "<label class='btn btn-dark'>"
                            . "<tr><td> <input type='radio' name='opts' value='insert' checked> Inserir</td>"
                            . "<td> <input type='radio' name='opts' value='update'> Atualizar</td>"
                            . "<td> <input type='radio' name='opts' value='delete'>  Apagar</td>"
                            . "</label>"
                            . "</tr>"
                          // . "<tr> <td> <input name='btop' type='submit' class='btn btn-dark btn-lg btn-block' value='Escolher' /> </td> </tr>"
                            
                               
  /*<label class="btn btn-primary active">
    <input type="radio" name="options" id="option1" autocomplete="off" checked> Radio 1 (preselected)
  </label><label class="btn btn-primary"> <input type="radio" name="options" id="option2" autocomplete="off"> Radio 2
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option2" autocomplete="off"> Radio 2
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option3" autocomplete="off"> Radio 3
  </label>
</div>
                            
                           . "</table>");
                    echo("<button name='btop' type='submit' class='btn btn-dark btn-lg btn-block'>Escolher</button>");
                    echo("</form>");
                 echo("</div>");
           */ ?>
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