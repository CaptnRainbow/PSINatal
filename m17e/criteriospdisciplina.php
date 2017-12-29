
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <span class="nav-link-text">Ações em Disciplinas</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="criteriospdisciplina.php">Enviar Critérios por Disciplina</a>
            </li>
            <li>
              <a href="admindisciplina.php">Administração de Disciplinas</a>
            </li>
          </ul>
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
      
      
    </div>
        <?php
                 $servername = "localhost";
                 $username = "root";
                 $password = "";
                 $dbname = "mod17";

                 $sql = "SELECT MAX(`data_inicio`) FROM `ano_letivo`";
                 $conn = new mysqli($servername,$username,$password,$dbname);
                 $conn->set_charset('utf8');

                 $result = $conn->query($sql);
                 $registoresultado = $result->fetch_row();  
                 $stringanoletivo = "". substr($registoresultado[0],0,4) . " - "  . intval(substr($registoresultado[0],0,4)+1);
                    echo("<h1>Ano Letivo " . $stringanoletivo . "</h1><br/><br/><br/>");
                    echo("<table>");
                        echo("<form action='submetercriterios.php' method='POST'>");
                            echo("<tr><td>Departamento: </td><td></td></tr>");
                        echo("</form>");
                    echo("</table>");
                ?>
   

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
