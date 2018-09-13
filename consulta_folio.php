<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consultar tramite</title>
<link rel="shortcut icon" href="img/ico.png" />
<link href="assets/bootstrap.css" rel="stylesheet">
</head>
<body background="img/apaseo_alto.jpg">
<p><br/></p>
<div class="container">
<!-- Header -->
<div class="panel panel-default">
<div style="background-color:#334e87; border-color:#042944;" class="panel-heading">
<div align="center"><img src="img/sare_header_1.png" class="img-rounded img-responsive" ></div>
</div>

<div class="panel-body">
<h3 align="center" style="color:color:#042944;">DIRECCI&Oacute;N DE DESARROLLO URBANO, ECOLOGÍA Y PLANEACIÓN DE <p>APASEO EL ALTO, GTO</p></p></h3>
<p align="center" style="font-size:20px;">SARE</p>

<span style="color:#373435; font-size:18px;">Buscar por:</span>
<div class="row">
<div class="col-md-3">
<div class="input-group">
<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-list-alt"></span> Folio</span>
<!--<input type="date" name="calendario" id="calendario" class="form-control fechas" placeholder="" aria-describedby="sizing-addon2">-->
<input type="number" name="folio"  class="form-control fechas" id="folio" >
</div></div>


<div class="col-md-6">
<div class="input-group">
<input type="submit" class="btn btn-primary" name="Submit" value="Ver Solicitud" onClick="viewdata()">
</div></div>
<div class="col-md-1">
<div class="input-group">
</div></div>
</div>
<br/><br/><br/>
<div id="info"></div>
<div id="viewdata" style="background: #FFFFFF; align-content:center;  ;"><?php  ?></div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function viewdata(){
	var folio = $("#folio").val();
	var estatus = $("#estatus").val();
       $.ajax({
	   type: "GET",
	   data:{tipofolio:folio,tipoestatus:estatus},
	   url: "consulta_folio2.php"
      }).done(function( data ) {
	  $('#viewdata').html(data);
      });
    }
	
	</script>
    <!-- Footer -->
<div style="background-color:#334e87; border-color:#025196" class="panel-footer" align="center">
<center><img src="img/logo_tics_2.png" class="img-responsive" border="0"></center>
	<font color="white"><div align="center">
    <b>Dir. de Tecnolog&iacute;as de Informaci&oacute;n y Comunicaciones</b></br>
    <b>Desarrollo de Sistemas</b></div></font>
</div>
<!-- Finish Footer -->
	
</body>
</html> 


