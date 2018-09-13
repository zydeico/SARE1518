<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Acceso</title>
<link rel="icon" type="image/png" href="img/ico.png" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin-ext');


#playground-container {
    height: 500px;
    overflow: hidden !important;
    
}
.main{margin-top:70px; 
-webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
-moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
padding:0px;
background:#0650BA;
}
.fb:focus, .fb:hover{color:FFF !important;}
body{
font-family: 'Raleway', sans-serif;
}

.left-side{
	padding:0px 0px 0px;
	
	background-size:cover;
}
.left-side h3{
	font-size: 30px;
    font-weight: 900;
	color:#FFF;
	padding: 50px 10px 00px 26px;
	}
	
	.left-side p{
    font-weight:600;
	color:#FFF;
	padding:10px 10px 10px 26px;
	}

	
	.fb{background: #2d6bb7;
    color: #FFF;
    padding: 10px 15px;
    border-radius: 18px;
    font-size: 12px;
    font-weight: 600;
    margin-right: 15px;
	margin-left:26px;-webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
-moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);}
	.tw{background: #20c1ed;
    color: #FFF;
    padding: 10px 15px;
    border-radius: 18px;
    font-size: 12px;
    font-weight: 600;
    margin-right: 15px;-webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
-moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);}
	
	.right-side{
	padding:0px 0px 0px;
	background:#FFF;
	background-size:cover;
	min-height:514px;
}
	.right-side h3{
	font-size: 30px;
    font-weight: 700;
	color:#000;
	padding: 50px 10px 00px 50px;
	}
	.right-side p{
    font-weight:600;
	color:#000;
	padding:10px 50px 10px 50px;
	}
	.form{padding:10px 50px 10px 50px;}
    .form-control{box-shadow: none !important;
    border-radius: 0px !important;
    border-bottom: 1px solid #2196f3 !important;
    border-top: 1px !important;
    border-left: none !important;
    border-right: none !important;}
	.btn-deep-purple {
    background: #334e87;
    border-radius: 18px;
    padding: 5px 19px;
    color: #FFF;
    font-weight: 600;
    float: right;
	-webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
-moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
}
</style>
</head>
   <form action="" method="post">
<body background="img/fondo-apaseo-aa.jpg">
<div class="container">
	    <div align="center"><img src="img/logo_sal_energia.png" class="img-responsive"></div>
		<div class="col-md-10 col-md-offset-1 main" >
		<div class="col-md-6 left-side" ><br><br><br><br><br><br>
        <!--<p align="center" style="font-size:80px;">CADE</p>
        <p align="center" style="font-size:40px;">Centro de Atención y</p>
        <p align="center" style="font-size:40px;">Desarrollo Empresarial</p>-->
        <img src="img/logo_al_apaseo.png" class="img-responsive" style="padding: 10px 20px;">
		<br>


		</div><!--col-sm-6-->
		
		<div class="col-md-6 right-side">
		<h3 style="color:#8c8f91;">Iniciar Sesión</h3>
		
<!--Form with header-->
<div class="form">


        <div class="form-group">
		    <i class="glyphicon glyphicon-user"></i>     <label for="form2">Usuario:</label>
            <input type="text" id="form2" name="usuario"class="form-control input-lg" autofocus required>
            
        </div>

        <div class="form-group">
		    <i class="glyphicon glyphicon-lock"></i>     <label for="form4">Contraseña:</label>
            <input type="password" id="form4" name="contrasena" class="form-control input-lg" required>
           
        </div>

        <div class="text-xs-center">
            <button class="btn btn-deep-purple" type="submit" name="entrar" value="Iniciar Sesión">Accesar</button>
        </div>


</div>
<!--/Form with header-->

		</div><!--col-sm-6-->
		
		
        </div><!--col-sm-8-->
        
        </div><!--container-->
</body>
</form>
</html>
<?php
if($_POST['entrar']=='Iniciar Sesión'){
include("conexion.php");

$user=$_POST['usuario'];
$pass=md5($_POST['contrasena']);

$consulta="SELECT * FROM tblusuarios WHERE usuario='".$user."' AND contrasena='".$pass."'"; 
$consultar=mysql_query($consulta) or die(mysql_error()); 
$row = mysql_fetch_array($consultar);
 
if(mysql_num_rows($consultar)==1){ 
 
//$_SESSION['usuario']=$user;
$_SESSION['nivel']=$row['nivel'];
$_SESSION['usuario']=$row['usuario'];
 
if($_SESSION['nivel'] == '1'){
 
echo "<script language=\"javascript\">
window.location.href=\"menu.php\";
</script>";

}elseif($_SESSION['nivel'] == '2'){
 
echo "<script language=\"javascript\">
window.location.href=\"fdreportes.php\";
</script>";

}}else{ // Sino devolvio 1 resultado
$mens = "USUARIO Y/O CONTRASEÑA INCORRECTA"; 
print "<script>alert('$mens')</script>";
}}


?>