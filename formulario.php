<!doctype html>
<html>
<head>
<meta charset="iso-8859-1">
<title>Solicitud de tramite</title>
<link rel="icon" type="image/png" href="img/ico.png" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<SCRIPT language="JavaScript" type="text/javascript">
<!--
function checkCheckBox(f){
if (f.a.checked == false )
{
alert("DEBES ACEPTAR EL AVISO DE PRIVACIDAD");
return false;
}else
return true;
}
//-->
</SCRIPT> 
</head>

<body background="img/fondo_salamanca.png">
<div class="container">
<!-- Header -->
<div class="panel panel-default">
<div style="background-color:#334e87; border-color:#042944;" class="panel-heading">
<div align="center"><img src="img/sare_header_1.png" class="img-rounded img-responsive" ></div>
</div>
<!-- Finish Header -->
<!-- Body -->
<form method="post" action="guardar_solicitud.php" onsubmit="return checkCheckBox(this)">
<div class="panel-body">
<h3 align="center" style="color:color:#042944;">DIRECCION DE DESARROLLO URBANO, ECOLOGÍA Y PLANEACIÓN DE <p>APASEO EL ALTO, GTO</p></h3>
<p align="center" style="font-size:20px;">SARE</p>
<p align="right" style="font-size:12px; font-style:italic; color:#FF8800;"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Campos requeridos</p>

<div class="row">
	<div class="col-md-8">
        <p align="left" style="font-size:20px;">Solicitud de Tramite&nbsp;</p>
	</div>
		
    <div class="col-md-4">
        <!-- Modal -->
		<div style="float:right;" class="alert alert-info" role="alert" style="width:200px;">
		<span aria-hidden="true"><input type="checkbox" name="a" value="0" style="transform:scale(1.5)"/></span>
  		<a  class="alert-link" data-toggle="modal" data-target="#myModal">&nbsp;&nbsp;Acepto aviso de privacidad</a>
		</div>
		<div class="modal fade" id="myModal" role="dialog">
    	<div class="modal-dialog">
    	<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Aviso de Privacidad</h4>
        </div>
        <div class="modal-body" align="justify">
          <p>Nota: &ldquo;Los datos recabados ser&aacute;n protegidos, incorporados y tratados en el banco de datos de la Direcci&oacute;n General de Desarrollo Econ&oacute;mico, con 									          fundamento en el art&iacute;culo 3 fracci&oacute;n IX de la Ley de Protecci&oacute;n de Datos Personales para el Estado y los Municipios de Guanajuato (LPDPG), y cuya       finalidad es contar con los datos necesarios para llevar acabo la asesor&iacute;a y/o tr&aacute;mite solicitado, y con fines estad&iacute;sticos, as&iacute; como en el banco de datos, el cual fue registrado en el Registro Estatal de Datos Personales ante el Instituto de Acceso a la Informaci&oacute;n P&uacute;blica, y los cuales podr&aacute;n ser cedidos a toda la Administraci&oacute;n P&uacute;blica Municipal, Centralizada, Descentralizada o Paramunicipal y/o Terceros contratados por &eacute;stas con fundamento en el numeral 3 fracci&oacute;n III de la LPDPG, con la finalidad, exclusivamente, de que pueda ser tomado en cuenta para otros programas, eventos o tramites que pudieran beneficiarlo directamente, adem&aacute;s de otras cesiones previstas por la Ley.  Lo anterior se informa en cumplimiento de la Ley de Protecci&oacute;n de Datos Personales para el Estado y los Municipios de Guanajuato, publicada en el Peri&oacute;dico Oficial del Estado el viernes 19 de mayo de 2006&rdquo;. Acept&oacute; y autoriz&oacute;</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Finish Modal -->
		</div>
	</div>


    <div class="row">
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange" ></span> Fecha</span>
          <input type="date" name="fecha" id="fecha" class="form-control fechas" placeholder="" aria-describedby="sizing-addon2"   value="<?php echo date("Y-m-d"); ?>"required>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Sector</span>
          <div class="form-control">
            <span><input type="radio" name="opsector" value="Comercio"> Comercio</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span><input type="radio" name="opsector" value="Servicio"> Servicio</span>&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Clasificaci&oacute;n</span>
          <div class="form-control">
            <span><input type="radio" name="clasificacion"  checked="checked" value="Micro"> Micro</span>&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </div>
      </div>
      
    </div>

	<div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Nombre(Raz&oacute;n Social)</span>
          <input name="rsocial" id="rsocial" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-8">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Direcci&oacute;n Establecimiento</span>
          <input name="destablecimiento" id="destablecimiento" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>

      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Colonia</span>
          <input type="text" name="col" id="col" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Giro del Negocio</span>
          <input name="giro" id="giro" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Fecha de Nacimiento</span>
          <input name="fnacimiento" id="fnacimiento" type="date" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>
       <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Estado Civil</span>
          <input name="opecivil" id="opecivil" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>
     </div>
      
    <div class="row">
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Nivel de Estudios</span>
          <input name="nestudios" id="nestudios" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Tel&eacute;fono</span>
          <input type="text" name="ntelefono" id="ntelefono" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Email</span>
          <input name="email" id="email" type="email" class="form-control" placeholder="" aria-describedby="sizing-addon2">
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Tipo de Empresa</span>
          <div class="form-control">
            <span><input type="radio" name="optempresa" value="Nueva"> Nueva</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span><input type="radio" name="optempresa" value="Regularizada"> Regularizada</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span><input type="radio" name="optempresa" value="Renovacion"> Renovaci&oacute;n</span>&nbsp;&nbsp;&nbsp;&nbsp;
           
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Empleos</span>
          <input name="empleos" id="empleos" type="number" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>
      

      <div class="col-md-8">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Inversi&oacute;n</span>
          <input type="text" name="inversion" id="inversion" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Superficie a utilizar en el negocio</span>
          <input name="superficie" id="superficie" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" required>
        </div>
      </div>
      </div>
      
      <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><a href="pdfs/FUA.pdf" target="_blank"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Formato Unico de Apertura</span></a> 
        </div>
      </div>
      </div>
      
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Asunto</span>
          <textarea name="asunto" id="asunto" class="form-control text-info"  readonly rows="2" id="info" >Tramite de uso de suelo</textarea>
          
        </div>
        
        <div class="input-group">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1869.0904471033741!2d-100.62203379547184!3d20.457762122777545!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d34b4bcb025951%3A0x4900e1650b089119!2sPalacio+Municipal!5e0!3m2!1ses!2smx!4v1527625593822" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        
      </div>
    </div>
    
    <button class="btn btn-lg btn-primary" type="submit" name="enviar" value="Enviar">Continuar con tu tramite</button>
    
    <a href="https://www.facebook.com/MunicipioDeApaseoElAlto/" target="_blank"><img style="float:right" width="35" height="35" class="img-responsive" src="img/facebook.jpg"></a>
    
</div>
<!-- Finish Body -->

<!-- Footer -->
<div style="background-color:#334e87; border-color:#025196" class="panel-footer" align="center">
<center><img src="img/logo_tics_2.png" class="img-responsive" border="0"></center>
	<font color="white"><div align="center">
    <b>Dir. de Tecnolog&iacute;as de Informaci&oacute;n y Comunicaciones</b></br>
    <b>Desarrollo de Sistemas</b></div></font>
</div>
<!-- Finish Footer -->

</div>
</form>
</body>
</html>
