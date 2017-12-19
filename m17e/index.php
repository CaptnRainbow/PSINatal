<?php

session_start();

?>

<!DOCTYPE HTML>

<HTML>
    <HEAD>
        <LINK REL="stylesheet" HREF="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" CROSSORIGIN="anonymous">
        <SCRIPT SRC="https://code.jquery.com/jquery-3.2.1.slim.min.js" CROSSORIGIN="anonymous"></SCRIPT>
        <SCRIPT SRC="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" CROSSORIGIN="anonymous"></SCRIPT>
        <SCRIPT SRC="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" CROSSORIGIN="anonymous"></SCRIPT>
        <SCRIPT>
            function checkvalues(){
                var field0 = document.getElementById("username").value;
                var field1 = document.getElementById("password").value;
                if(field0 === "" || field1 === ""){
                    document.getElementById("SubmitBtn").setAttribute("disabled", true);
                }else{
                    document.getElementById("SubmitBtn").removeAttribute("disabled");
                }
            }
        </SCRIPT>
        <STYLE>
            @import url('https://fonts.googleapis.com/css?family=Roboto');
        </STYLE>
        <META CHARSET="UTF-8">
        <TITLE>Gestão de Critérios de Avaliação</TITLE>
    </HEAD>
    <BODY onload="checkvalues()" style="background: url(/resources/loginbg.jpeg) no-repeat center center fixed;"> 
        <BR/>
        <DIV class="card border-info mb-3" style="max-width: 20rem; margin-left: auto; margin-right: auto;">
            <H1 STYLE="font-family: 'Roboto', sans-serif; text-align: center;"><B><BR/>Login</B></H1>
            <HR style="height: 5px; border: 0px solid #17a2b8; border-top-width: 1px;"/>
        <DIV class="card-body text-info"> 
            <FORM ACTION="loginscript.php" METHOD="POST">
                <TABLE STYLE="margin-left:auto;margin-right:auto;">
                    <TR><TD>
                            <DIV CLASS="input-group">
                                <SPAN CLASS="input-group-addon" ID="basic-addon1" STYLE="font-size:22px"><B> @ </B></SPAN><INPUT onchange="checkvalues()" TYPE="text" CLASS="form-control" PLACEHOLDER="Nome de Utilizador" ARIA-LABEL="Username" ARIA-DESCRIBEDBY="basic-addon1" NAME="username" id="username">
                            </DIV>
                    </TD></TR>
                    <TR><TD>
                            <DIV CLASS="input-group">
                                <SPAN CLASS="input-group-addon" ID="basic-addon1" STYLE="font-size:22px"><B>  •  </B></SPAN><INPUT onchange="checkvalues()" TYPE="password" CLASS="form-control" PLACEHOLDER="Palavra-Passe" ARIA-LABEL="Password" ARIA-DESCRIBEDBY="basic-addon1" NAME="password" id="password">
                            </DIV> 
                    </TD></TR>
                    <TR><TD COLSPAN="2">
                            <BUTTON TYPE="submit" CLASS="btn btn-outline-info btn-block" NAME="SubmitBtn" id="SubmitBtn">Entrar</BUTTON>
                    </TD></TR>
                </TABLE>
            </FORM>
        </DIV>
        </DIV>
    </BODY>
</HTML>
