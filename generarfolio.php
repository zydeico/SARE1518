<?php session_start();?>
<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Sare</title>
<link rel="icon" type="image/png" href="img/ico.png" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
<?php

include "conexion.php";
$foliou=$_SESSION['folio_generado'];;

$sql = "SELECT * FROM tblsolicitud  WHERE folio='$folio'";

$result = mysql_query ($sql);
// verificamos que no haya error
if ( !$result )
     die ("Error ejecutando la consulta");
    
    
    $num_filas = mysql_num_rows($result);
    
    if ($num_filas > 0){        
        $fila = mysql_fetch_array($result);
        }
?>
<form method="post" action="">
<div class="panel-body">
<h3 align="center" style="color:color:#042944;">DIRECCION DE DESARROLLO URBANO, ECOLOG&Iacute;A Y PLANEACI&Oacute;N DE <p>APASEO EL ALTO, GTO</p></h3>
<p align="center" style="font-size:20px;">SARE</p>
<!--<p align="right" style="font-size:12px; font-style:italic; color:#FF8800;"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Campos requeridos</p>-->
<p align="left" style="font-size:20px;">Solicitud de Tramite</p>

<div class="row">
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange" ></span> Folio</span>
          <input type="text" name="folios" id="folios" class="form-control fechas" placeholder="" aria-describedby="sizing-addon2"   value="<?php echo $fila["folio"]; ?>" readonly>
        </div>
      </div>
</div>
    <div class="row">
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange" ></span> Fecha</span>
          <input type="date" name="fecha" id="fecha" class="form-control fechas" placeholder="" aria-describedby="sizing-addon2"   value="<?php echo $fila["fecha"]; ?>"readonly>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Sector</span>
          <div class="form-control" readonly>
            <span><input type="radio" name="opsector" DISABLED  value="Comercio"  <?php if($fila["sector"]=='Comercio') print "checked=true"?> > Comercio</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span><input type="radio" name="opsector" DISABLED  value="Servicio"  <?php if($fila["sector"]=='Servicio') print "checked=true"?>> Servicio</span>&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Clasificaci&oacute;n</span>
          <div class="form-control" readonly>
            <span><input type="radio" name="clasificacion"  value="Micro" <?php if($fila["clasificacion"]=='Micro') print "checked=true"?> > Micro</span>&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </div>
      </div>
      
    </div>

	<div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Nombre(Raz&oacute;n Social)</span>
          <input name="rsocial" id="rsocial" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["rsocial"]; ?>" readonly>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-8">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Direcci&oacute;n Establecimiento</span>
          <input name="destablecimiento" id="destablecimiento" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["destablecimiento"]; ?>" readonly>
        </div>
      </div>

      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Colonia</span>
          <input type="text" name="col" id="col" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["colonia"]; ?>" readonly>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Giro del Negocio</span>
          <input name="giro" id="giro" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2"  value="<?php echo $fila["gdnegocio"]; ?>"readonly>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Fecha de Nacimiento</span>
          <input name="fnacimiento" id="fnacimiento" type="date" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["fnacimiento"]; ?>" readonly>
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Estado Civil</span>
          <input name="opecivil" id="opecivil" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["ecivil"]; ?>" readonly>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Nivel de Estudios</span>
          <input name="nestudios" id="nestudios" type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["nestudios"]; ?>" readonly>
        </div>
      </div>

      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Tel&eacute;fono</span>
          <input type="tel" name="ntelefono" id="ntelefono" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["tel"]; ?>" readonly>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Email</span>
          <input name="email" id="email" type="email" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["email"]; ?>" readonly>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Tipo de Empresa</span>
          <div class="form-control" readonly>
            <span><input type="radio" name="optempresa"  DISABLED  value="Nueva" <?php if($fila["tempresa"]=='Nueva') print "checked=true"?>> Nueva</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span><input type="radio" name="optempresa" DISABLED  value="Regularizada" <?php if($fila["tempresa"]=='Regularizada') print "checked=true"?>> Regularizada</span>&nbsp;&nbsp;&nbsp;&nbsp;
           
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Empleos</span>
          <input name="empleos" id="empleos" type="number" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["empleos"]; ?>" readonly>
        </div>
      </div>

      <div class="col-md-8">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Inversi&oacute;n</span>
          <input type="text" name="inversion" id="inversion" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["inversion"]; ?>" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign orange"></span> Superficie a utilizar en el negocio</span>
          <input type="text" name="superficie" id="superficie" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["superficie"]; ?>" readonly>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Asunto</span>
          <input type="text" name="asunto" id="asunto" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="<?php echo $fila["asunto"]; ?>" readonly>
        </div>
      </div>
    </div>
     <div class="row">
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2"> Documentos   </span>
            <label>&nbsp;
            <input type="checkbox" name="CheckboxGroup1" id="CheckboxGroup1_0" style="transform:scale(1.5)" value="1"
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Acta_Constitutiva.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED />
            Acta Constitutiva</label>
            <br>
			<?php 
			/*$file ='../../documentos/'.$_SESSION[folio_generado]."_"."Identificacion.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	 		if( $exists =='1') 
			print '<input type="checkbox" name="CheckboxGroup1" id="CheckboxGroup1_1" value="1" checked="true" disabled>' 
			*/?>
            <!--<label>Identificaci�n
            </label>            
            <br>-->
            
            <label>&nbsp;
            <input type="checkbox" name="CheckboxGroup1" id="CheckboxGroup1_0" style="transform:scale(1.5)" value="1"
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Contrato_de_arrendamiento.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED />
            Contrato de arrendamiento</label>
            <br>
            
            <label>&nbsp;
            <input type="checkbox" name="CheckboxGroup1" id="CheckboxGroup1_0" style="transform:scale(1.5)" value="1"
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Contrato_de_Comodato.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED />
            Contrato de Comodato</label>
            <br>
            
            <label> &nbsp;
            <input type="checkbox" name="CheckboxGroup1" id="CheckboxGroup1_0" style="transform:scale(1.5)" value="1"
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Escritura.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED />
            Escritura</label>
            <br>
            
            
            <label>&nbsp;
            <input type="checkbox" name="CheckboxGroup1" id="CheckboxGroup1_0" style="transform:scale(1.5)" value="1"
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Identificacion.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED />
            Identificaci&acute;n</label>
            <br>
            
             <label>&nbsp;
            <input type="checkbox" name="CheckboxGroup1" id="CheckboxGroup1_0" style="transform:scale(1.5)" value="1"
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Poder_Notarial.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED />
            Poder Notarial</label>
            <br>
            <label>&nbsp;
            <input type="checkbox" name="CheckboxGroup1" id="CheckboxGroup1_0" style="transform:scale(1.5)" value="1"
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Formato_Apertura.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED />
            Formato de Apertura</label>
            <br>
            <label>&nbsp;
            <input type="checkbox" name="CheckboxGroup1" id="CheckboxGroup1_0" style="transform:scale(1.5)" value="1"
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Revision_de_Predial.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED />
            Revision de Predial</label>
            <br>
        </div>
             
           
      </div>
      <div class="row">
      <div class="col-md-6">
        <div class="input-group">
            <span  id="sizing-addon2"> <span style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 16px; color: #FF8800; font-weight: bold;"> Si tu documento no aparece seleccionado favor de volverlo a subir</span>.</span>
        
        </div>
      </div>
    </div>
    </div> <p> Nota: Para dar seguimiento a tu solicitud es necesario imprimir el formato o anotar tu n&uacute;mero de folio.</p><br/>
    <button class="btn btn-lg btn-primary" type="submit" name="regresar" value="regresar"  onclick="history.back(-1)">Regresar</button>
    <button class="btn btn-lg btn-primary" type="submit" name="imprimir" value="Enviar"  onClick="print()" >Imprimir</button>
    <button class="btn btn-lg btn-primary" type="submit" name="salir" value="Salir"   >Terminar</button>
    <?php 
	if( $_POST['salir']=='Salir'){
session_destroy();
$mens1 = "REGISTRO EXITOSO";
print "<script>alert('$mens1')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=index.php >');
}?>
    </div>


<!-- Finish Body -->
</div>  


</form>
</body>
</html>
