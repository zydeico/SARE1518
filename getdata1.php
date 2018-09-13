<?php 
	session_start();
	//$_SESSION['fol']='';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/fileinput.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/fileinput.css" />

<style type="text/css">
  .bg0 {  
      background:#999;
      color:#FFF; 
      font-family:Arial, Helvetica, sans-serif;
      bordercolor:#FFFFFF;
      font-size:18px;
      height:50px;}
      
  .bg1 {  
      background:#F6CECE; /*verde*/
      color:#000; 
      bordercolor:#FFFFFF;
      font-size:14px;}
      
  .bg2 {  
      background:rgba(248,248,248,1.00); /* rojo*/
      color:#000; 
      bordercolor:#FFFFFF;
      font-size:14px;}
      
  .bg3 {  
      background:#CEE3F6; 
      color:#000; 
      bordercolor:#FFFFFF;
      font-size:14px;}
</style>




	
<?php
header('content-Type: text/html; charset=utf-8');
$con=mysql_connect("localhost", "apaseoel_sare151", "Vur(IID1c1N;") or die("No se pudo conectar: " . mysql_error());
mysql_set_charset('utf-8',$con);
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $con);
//mysql_set_charset('utf8_decode',$con);
mysql_select_db("apaseoel_sare1518");

$fecha = date("Y-m-d");
mysql_set_charset('utf-8',$con);


$resultado = mysql_query("SELECT * FROM tblsolicitud where estatus='Pendiente'");

$result=mysql_num_rows($resultado);


if ($result > 0){
?>
<table class="table table-bordered table-hover">
	<thead>
	  <tr class="active">
	    <th style="text-align:center;">FOLIO</th>
		<th style="text-align:center;">RAZON SOCIAL</th>
	    <th style="text-align:center;">DIRECCION</th>
	    <th style="text-align:center;">FECHA</th>
	    <th style="text-align:center;">ESTATUS</th>
		<th>MODIFICAR</th>
        <th>VERIFICAR DOCUMENTOS</th>
        <th>SUBIR DOCUMENTOS</th>
	  </tr>
	</thead>
	<tbody>
<?php
while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
  if ($row['estatus'] == 'Pendiente') { $estilo = 'bg2'; } else if ($row['estatus'] == 'Cancelado'){ $estilo = 'bg1'; } else if ($row['estatus'] == 'Finalizado'){ $estilo = 'bg3'; }
?>
    
	  <tr class="<?php echo $estilo ?>">
	    <td style="text-align:center;"><?php echo $row['folio']; ?></td>
		<td style="text-align:center;"><?php echo $row['rsocial']; ?></td>
	    <td style="text-align:center;"><?php echo $row['destablecimiento']; ?></td>
	    <td style="text-align:center;"><?php echo $row['fecha']; ?></td>
	    <td style="text-align:center;"><?php echo $row['estatus']; ?></td>
	    <td>
		<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['folio']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
		
	  <div class="modal fade" id="myModal<?php echo $row['folio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['folio']; ?>" aria-hidden="true">
	  
			

  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['folio']; ?>">FOLIO: <?php echo ' '. $row['folio']; ?></h4>
      </div>
      <div class="modal-body">
<form>
<div class="row">  
	<div class="col-md-3">
		<div class="form-group">
			<label for="f">FECHA</label>
			<input type="text" class="form-control"  id="f<?php echo $row['folio']; ?>" value="<?php echo date("Y-m-d"); ?>">
		</div>
	</div>
		
     <div class="col-md-3">
		<div class="form-group">
			<label for="s">SECTOR</label>
			<select class="form-control" id="s<?php echo $row['folio']; ?>">
          <option value="<?php echo $row['sector']; ?>"> <?php echo $row['sector']; ?> </option>
		  <option value="--"> -- </option>
		  <option value="Comercio"> COMERCIO </option>
          <option value="Servicio" > SERVICIO </option>
          </select>
		</div>
	</div>   	
	<div class="col-md-6">
		<div class="form-group">
    		<label for="c">CLACIFICACI&Oacute;N</label>
    		<input type="text" class="form-control"  id="c<?php echo $row['folio']; ?>" value="<?php echo $row['clasificacion']; ?>">
 		 </div>
	</div>
</div>
  
<div class="row"> 
	<div class="col-md-12">
		<div class="form-group">
    		<label for="n">NOMBR(RAZON SOCIAL)</label>
    		<input type="text" class="form-control"  id="n<?php echo $row['folio']; ?>" value="<?php echo $row['rsocial']; ?>">
  		</div>
	</div>
	
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group">
    		<label for="d">DIRECCI&Oacute;N ESTABLECIMIENTO</label>
    		<input type="text" class="form-control"  id="d<?php echo $row['folio']; ?>" value="<?php echo $row['destablecimiento']; ?>">
  		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
    		<label for="co">COLONIA</label>
    		<input type="text" class="form-control"  id="co<?php echo $row['folio']; ?>" value="<?php echo $row['colonia']; ?>">
  		</div>
	</div>
</div>
<div class="row"> 
	<div class="col-md-12">
		<div class="form-group">
    		<label for="g">GIRO DEL NEGOCIO</label>
    		<input type="text" class="form-control"  id="g<?php echo $row['folio']; ?>" value="<?php echo $row['gdnegocio']; ?>">
  		</div>
	</div>
	
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
    		<label for="fn">FECHA DE NACIMIENTO</label>
    		<input type="date" class="form-control"  id="fn<?php echo $row['folio']; ?>" value="<?php echo $row['fnacimiento']; ?>">
  		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
    		<label for="e">ESTADO CIVIL</label>
    		<input type="text" class="form-control"  id="e<?php echo $row['folio']; ?>" value="<?php echo $row['ecivil']; ?>">
  		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
    		<label for="ne">NIVEL DE ESTUDIOS</label>
    		<input type="text" class="form-control"  id="ne<?php echo $row['folio']; ?>" value="<?php echo $row['nestudios']; ?>">
  		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
    		<label for="t">TEL&Eacute;FONO</label>
    		<input type="text" class="form-control"  id="t<?php echo $row['folio']; ?>" value="<?php echo $row['tel']; ?>">
  		</div>
	</div>  
</div>
<div class="row"> 
	<div class="col-md-12">
		<div class="form-group">
    		<label for="em">EMAIL</label>
    		<input type="text" class="form-control"  id="em<?php echo $row['folio']; ?>" value="<?php echo $row['email']; ?>">
  		</div>
	</div>	
</div>
<div class="row"> 
	<div class="col-md-12">
		<div class="form-group">
    		<label for="te">TIPO EMPRESA</label>
    		<select class="form-control" id="te<?php echo $row['folio']; ?>">
          <option value="<?php echo $row['tempresa']; ?>"> <?php echo $row['tempresa']; ?> </option>
		  <option value="--"> -- </option>
		  <option value="Nueva"> NUEVA </option>
          <option value="Regularizada" > REGULARIZADA </option>
          <option value="Renovacion" > RENOVACION </option>
          </select>
  		</div>
	</div>	
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
    		<label for="emp">EMPLEOS</label>
    		<input type="text" class="form-control"  id="emp<?php echo $row['folio']; ?>" value="<?php echo $row['empleos']; ?>">
  		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
    		<label for="i">INVERSI&Oacute;N</label>
    		<input type="text" class="form-control"  id="i<?php echo $row['folio']; ?>" value="<?php echo $row['inversion']; ?>">
  		</div>
	</div>  
</div>
	<div class="form-group">
    	<label for="a">ASUNTO</label>
		<textarea rows="1" cols="30" class="form-control"  disabled><?php echo $row['asunto']; ?></textarea>
  </div>
<div class="form-group">
    <label for="es">ESTATUS
          <select class="form-control" id="es<?php echo $row['folio']; ?>">
          <option value="<?php echo $row['estatus']; ?>"> <?php echo $row['estatus']; ?> </option>
		  <option value="--"> -- </option>
		  <option value="Pendiente"> PENDIENTE </option>
          <option value="Finalizado" > FINALIZADO </option>
          <option value="Cancelado" > CANCELADO </option>
          </select>
    </label>
  </div>
  
  <div class="form-group">
    <label for="ed">ENTREG&Oacute; DOCUMENTACI&Oacute;N COMPLETA:
          <select class="form-control" id="ed<?php echo $row['folio']; ?>">
          <option value="<?php echo $row['estdocument']; ?>"> <?php echo $row['estdocument']; ?> </option>
		  <option value="--"> -- </option>
		  <option value="SI"> Si </option>
          <option value="NO" > No </option>
          </select>
    </label>
  </div>
  
  <div class="form-group">
    <label for="nt">PROCEDE SU TRAMITE:
          <select class="form-control" id="nt<?php echo $row['folio']; ?>">
          <option value="<?php echo $row['nota']; ?>"> <?php echo $row['nota']; ?> </option>
		  <option value="--"> -- </option>
		  <option value="NOTA 1"> NOTA 1 </option>
          <option value="NOTA 2"> NOTA 2 </option>
          <option value="NOTA 3"> NOTA 3 </option>
          <option value="NOTA 4"> NOTA 4 </option>
          </select>
    </label>
  </div>
  
  <p><b><font color="red">Nota 1:</font> APROBADO. Despu&eacute;s de un mes de la conclusi&oacute;n del tr&aacute;mite, si no se acude a recoger su permiso, la dependencia no se hace responsable de los documentos proporcionados por el ciudadano.</b>    </p>
  <p><b><font color="red">Nota 2:</font> No procede su tr&aacute;mite, debido a que la documentaci&oacute;n proporcionada NO est&aacute; completa.</b>    </p>
  <p><b><font color="red">Nota 3:</font> No procede su tr&aacute;mite, debido a que el giro a explotar NO se encuentra dentro de la tabla de giros considerados dentro del Manual de Operaci&oacute;n del SARE, para el Municipio de Apaseo el Alto, Gto., publicado en el Peri&oacute;dico Oficial del Gobierno del estado de Guanajuato, de fecha 3 de marzo del 2017.</b>    </p>
  <p><b><font color="red">Nota 4:</font> No procede su tr&aacute;mite, debido a que la superficie a utilizar rebasa los 240.00 m2.</b></p>
  
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<button type="button" onclick="updatedata('<?php echo $row['folio']; ?>')" class="btn btn-primary">Actualizar</button>
       </div>
    </div>
  </div>
</div>	    
</td> 


 <td>
<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $row['folio']; ?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
<div class="modal fade" id="myModal2<?php echo $row['folio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['folio']; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
	<!-- Modal content-->
    <div class="modal-content">
    <!-- Modal header-->
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title" id="myModalLabel<?php echo $row['folio']; ?>">FOLIO:<?php echo $row['folio']; ?></h4>
     </div>
     <!-- Modal body-->
     <div class="modal-body">
		<form>
        <input type="text" name="fol" id="fol" value="<?php echo $row['folio']; ?>" style="visibility:hidden;"><br>
        <?php 
		$no= $row['folio'];

	$nescritura=$no."_Escritura.pdf";
	$bescritura = file_exists("../documentos123/".$nescritura);
	

	if ($bescritura==1 ){
		echo "<a href='../documentos123/".$nescritura."'>$nescritura</a><br>"; 	
		
		}
		$no= $row['folio'];
		$carrendamiento=$no."_Contrato_de_arrendamiento.pdf";
		$bcarrendamiento = file_exists("../documentos123/".$carrendamiento);
  if ($bcarrendamiento==1){
	   echo "<a href='../documentos123/".$carrendamiento."'>$carrendamiento</a><br>"; 	
		}
		
		$no= $row['folio'];
		$ccomodato=$no."_Contrato_de_Comodato.pdf";
		$bccomodato = file_exists("../documentos123/".$ccomodato);
	
	 if ($bccomodato==1 ){
	   echo "<a href='../documentos123/".$ccomodato."'>$ccomodato</a><br>"; 	
		
		}
		$no= $row['folio'];
		$crpredial=$no."_Revision_de_Predial.pdf";
		$bcrpredial = file_exists("../documentos123/".$crpredial);
	if ($bcrpredial==1 ){
	   echo "<a href='../documentos123/".$crpredial."'>$crpredial</a><br>"; 	
		
		}
		$no= $row['folio'];
		$cidentificacion=$no."_Identificacion.pdf";
		$bcidentificacion = file_exists("../documentos123/".$cidentificacion);
		if ($bcidentificacion==1){
	   echo "<a href='../documentos123/".$cidentificacion."'>$cidentificacion</a><br>"; 	
		
		}
		$no= $row['folio'];
		$caconstitutiva=$no."_Acta_Constitutiva.pdf";
		$bcaconstitutiva = file_exists("../documentos123/".$caconstitutiva);
		if ($bcidentificacion==1){
	   echo "<a href='../documentos123/".$caconstitutiva."'>$caconstitutiva</a><br>"; 	
		
		}
		$no= $row['folio'];
	$cpnotarial=$no."_Poder_Notarial.pdf";	
	$bcpnotarial = file_exists("../documentos123/".$cpnotarial);
	if ($bcpnotarial==1){
	   echo "<a href='../documentos123/".$cpnotarial."'>$cpnotarial</a><br>"; 	
		
		}
		?>
		</form>
      </div>
      <!-- Modal footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       </div>
    </div>
  </div>
</div>	    
</td>
<td>

    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1<?php echo $row['folio']; ?>"><span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span></a>
    <div class="modal fade" id="myModal1<?php echo $row['folio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['folio']; ?>" aria-hidden="true">
	  
			

  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['folio']; ?>">FOLIO: <?php echo ' '. $row['folio']; ?></h4>
      </div>
      <div class="modal-body">
	
    <form role="form" id="feedbackForm" data-toggle="validator" data-disable="false"  method="post" onsubmit="return checkCheckBox(this)" name="feedbackForm" enctype="multipart/form-data" action="subir_documentos.php">


	<input type="text" name="fol" id="fol" value="<?php echo $row['folio']; ?>" style="visibility:hidden;">
	

<div class="row">
	<div class="col-md-8">
		<div class="form-group">
    		<label for="fn">Copia de Escrituras</label>
    		<input id="input1a" name="input1a" type="file" class="file" data-show-preview="false" multiple data-show-upload="false" data-max-File-Size="15000" data-allowed-file-extensions='["pdf"]'>
  		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
        <span class="glyphicon glyphicon-arrow-down"></span>
        	<label for="fn">Escrituras&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    		<input type="submit" value="Subir_Escrituras" name="Subir_Escrituras" id="Subir_Escrituras" class="btn btn-success btn-sm"  />
  		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group">
    		<label for="fn">Copia de Contrato Arrendamiento</label>
    		<input id="input1b"  name="input1b" type="file" class="file" data-show-preview="false" multiple data-show-upload="false" data-max-File-Size="15000" data-allowed-file-extensions='["pdf"]'>
  		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
        <span class="glyphicon glyphicon-arrow-down"></span>
        	<label for="fn">Contrato Arrendamiento</label>
    		<input type="submit" value="Subir_Contrato_de_Arrendamiento" name="Subir_Contrato_de_Arrendamiento" id="Subir_Contrato_de_Arrendamiento" class="btn btn-success btn-sm"  />
  		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group">
    		<label for="fn">Copia de Contrato de Comodato</label>
    		<input id="input1c"  name="input1c" type="file" class="file" data-show-preview="false" multiple data-show-upload="false" data-max-File-Size="15000" data-allowed-file-extensions='["pdf"]'>
  		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
        <span class="glyphicon glyphicon-arrow-down"></span>
        	<label for="fn">Contrato de Comodato</label>
    		<input type="submit" value="Subir_Contrato_de_Comodato" name="Subir_Contrato_de_Comodato" id="Subir_Contrato_de_Comodato" class="btn btn-success btn-sm"  />
  		</div>
	</div>
</div>



<div class="row">
	<div class="col-md-8">
		<div class="form-group">
    		<label for="fn">Revisión de Predial</label>
    		<input id="input1d"  name="input1d" type="file" class="file" data-show-preview="false" multiple data-show-upload="false" data-max-File-Size="15000"  data-allowed-file-extensions='["pdf"]'>
  		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
        <span class="glyphicon glyphicon-arrow-down"></span>
        	<label for="fn">Revisión de Predial</label>
    		<input type="submit" value="Subir_Revision_de_Predial" name="Subir_Revision_de_Predial" id="Subir_Revision_de_Predial" class="btn btn-success btn-sm"  />
  		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group">
    		<label for="fn">Copia de Identidicación</label>
    		<input id="input1e"  name="input1e" type="file" class="file" data-show-preview="false" multiple data-show-upload="false" data-max-File-Size="15000"  data-allowed-file-extensions='["pdf"]'>
  		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
        <span class="glyphicon glyphicon-arrow-down"></span>
        	<label for="fn">Identificación</label>
    		<input type="submit" value="Subir_Copia_de_Identificacion" name="Subir_Copia_de_Identificacion" id="Subir_Copia_de_Identificacion" class="btn btn-success btn-sm"  />
  		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group">
    		<label for="fn">Copia del Acta Constitutiva</label>
    		<input id="input1f"  name="input1f" type="file" class="file" data-show-preview="false" multiple data-show-upload="false" data-max-File-Size="15000"  data-allowed-file-extensions='["pdf"]'>
  		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
        <span class="glyphicon glyphicon-arrow-down"></span>
        	<label for="fn">Acta Constitutiva</label>
    		<input type="submit" value="Subir_Copia_del_Acta_Constitutiva" name="Subir_Copia_del_Acta_Constitutiva" id="Subir_Copia_del_Acta_Constitutiva" class="btn btn-success btn-sm"  />
  		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="form-group">
    		<label for="fn">Copia Poder Notarial</label>
    		<input id="input1g"  name="input1g" type="file" class="file" data-show-preview="false" multiple data-show-upload="false" data-max-File-Size="15000"  data-allowed-file-extensions='["pdf"]'>
  		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
        <span class="glyphicon glyphicon-arrow-down"></span>
        	<label for="fn">Poder Notarial</label>
    		<input type="submit" value="Subir_Copia_Poder_Notarial" name="Subir_Copia_Poder_Notarial" id="Subir_Copia_Poder_Notarial" class="btn btn-success btn-sm"  />
  		</div>
	</div>
</div>
</form>     
 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       </div>
    </div>
  </div>
</div>	    

 </td>
	  </tr>
<?php
}}else{echo '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  NO EXISTE NINGUN REGISTRO
</div>';}

?>
	</tbody>
      </table>