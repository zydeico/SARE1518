<?php
session_start();
//echo $_SESSION["id_empresa"];
//echo $_SESSION['usuario'];
if($_SESSION["nivel"]!="1"){
$mens = "Acceso denegado a este sitio"; 
print "<script>alert('$mens')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=index.php >');
}else{
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrador</title>
</head>
<link rel="icon" type="image/png" href="img/ico.png" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
.navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
</style>

<body background="img/fondo-apaseo.jpg">
<div class="navbar navbar-inverse bg-primary navbar-fixed-top" role="navigation">
    <div class="container"> 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a href="home.php" class="navbar-brand" target="menu">SARE</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="administrador.php" target="menu">Consulta Solicitud</a></li>
                 <li ><a href="formularioadm.php" target="menu">Nueva Solicitud</a></li>
               <!-- <li ><a href="http://bootsnipp.com/snippets/featured/nav-account-manager" target="_blank">Inspirado en este ejemplo</a></li>
                 <li class="dropdown">
                    <a href="formularioadm.php" target="menu" class="dropdown-toggle" data-toggle="dropdown">Registro
                    <span class="caret"></span>-->
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Link 2</a></li>
                    </ul>
                 </li>              
             </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<span class="glyphicon glyphicon-user"></span> -->
                        <strong>Salir</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            
                                        </p>
                                    </div>    
                                    <div class="col-lg-1">
                                   
                                         
                                        
                                        
                                        <p class="text-left">
                                         </div>
                                         <div class="col-lg-8">
                                   
                                         <p class="text-right small"><span class="glyphicon glyphicon-user icon-size"></span></p>
                                       <p class="text-right small" style="font-size:18px; ">Usuario:<?php echo $_SESSION['usuario']; ?></p>
                                            <!--<a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>-->
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="logout.php" class="btn btn-danger btn-block">Cerrar Sesion</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

</body>
</html><br/><br/><br/><br/>
<div class="embed-responsive embed-responsive-4by3">
<iframe src="home.php"  id="menu" name="menu" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>				
</div>
<?php }?>