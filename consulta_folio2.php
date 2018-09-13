
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
	
	#principal{
		width:85%;
		border:1px solid  #ddd;
		margin:auto;
		height:auto;
		text-align:center;	
		padding:1px;
		bottom:5px;
		box-shadow:8px 8px 5px #ddd;
	
	}
	#inf{
			background:#334e87; 
			border-color:#FFFFFF;
			border-width:8px;
			border-style:solid;
			max-width:100%;
		
	} 
	#inf1{
		background:#eee;
		 border-color:#FFFFFF;
		  border-width:8px; 
		  border-style:solid;
		  max-width:100%;
		}
	
	
</style>

<?php
header('content-Type: text/html; charset=iso-8859-1');
$con=mysql_connect("localhost", "apaseoel_sare151", "Vur(IID1c1N;") or die("No se pudo conectar: " . mysql_error());
mysql_set_charset('iso-8859-1',$con);
mysql_select_db("apaseoel_sare1518");
$folio = $_GET['tipofolio'];
$estatus = $_GET['tipoestatus'];

$resultado = mysql_query("SELECT * FROM tblsolicitud where folio='$folio' ");
$result=mysql_num_rows($resultado);
if ($result > 0){
	
	$row = mysql_fetch_array($resultado, MYSQL_ASSOC);?>
	<!--<div   style=" border: solid #334e87;border-top-width: 1px;border-left-width:2px; width:880px; height:150px;">-->
     <br>
   
    <div class="row" id="principal">
   <div  align="center" class="col-md-6 " id="inf"><p style=" margin:5px; color:#F7F3F3; font-size:20px;">Su folio es:</p></div>
  <div  class="col-md-6" align="left" id="inf1"> <p style=" margin:5px;color:#000000; font-size:20px;"><?php echo "   ".$row['folio']; ?></p></div>
  
    <div  align="center"  class="col-md-6" id="inf"><p style=" margin:5px; color:#F7F3F3; font-size:20px;">Asunto:</p></div>
  <div  class="col-md-6" align="left" id="inf1"> <p style=" margin:5px; color:#000000; font-size:20px;"><?php echo "   ".$row['asunto']; ?></p></div>
    
    <div  align="center"  class="col-md-6" id="inf"><p style=" margin:5px; color:#F7F3F3; font-size:20px;">Nombre (Raz&oacute;n Social):</p></div>
  <div  class="col-md-6" align="left" id="inf1"> <p style=" margin:5px; color:#000000; font-size:20px;"><?php echo "   ".$row['rsocial']; ?></p></div>
   	
    <div  align="center"  class="col-md-6" id="inf"><p style=" margin:5px; color:#F7F3F3; font-size:20px;">La fecha de ingreso del tr&aacute;mite es:</p></div>
  <div  class="col-md-6" align="left" id="inf1"> <p style=" margin:5px; color:#000000; font-size:20px;"><?php echo "   ".$row['fecha']; ?></p></div>

  <div  align="center"  class="col-md-6" id="inf"><p style=" margin:3px; color:#F7F3F3; font-size:20px;">Entreg&oacute; Documentaci&oacute;n completa:</p></div>
  <div  class="col-md-6" align="left" id="inf1"> <p style=" margin:3px; color:#000000; font-size:20px;"><?php echo "   ".$row['estdocument']; ?></p></div>
  
  <div  align="center"  class="col-md-6" id="inf"><p style=" margin:5px; color:#F7F3F3; font-size:20px;">El estatus del tr&aacute;mite esta:</p></div>
  <div  class="col-md-6" align="left" id="inf1"> <p style="margin:5px; color:#000000; font-size:20px;"><?php echo "   ".$row['estatus']; ?></p></div>
  
  <div  align="center"  class="col-md-6" id="inf"><p style=" margin:5px; color:#F7F3F3; font-size:20px;">Aplica la Nota No:</p></div>
  <div  class="col-md-6" align="left" id="inf1"> <p style="margin:5px; color:#000000; font-size:20px;"><?php echo "   ".$row['nota']; ?></p></div>
  
  <p><b><font color="red">Nota 1:</font> APROBADO. Despu&eacute;s de un mes de la conclusi&oacute;n del tr&aacute;mite, si no se acude a recoger su permiso, la dependencia no se hace responsable de los documentos proporcionados por el ciudadano.</b>    </p>
  <p><b><font color="red">Nota 2:</font> No procede su tr&aacute;mite, debido a que la documentaci&oacute;n proporcionada NO est&aacute; completa.</b>    </p>
  <p><b><font color="red">Nota 3:</font> No procede su tr&aacute;mite, debido a que el giro a explotar NO se encuentra dentro de la tabla de giros considerados dentro del Manual de Operaci&oacute;n del SARE, para el Municipio de Apaseo el Alto, Gto., publicado en el Peri&oacute;dico Oficial del Gobierno del estado de Guanajuato, de fecha 3 de marzo del 2017.</b>    </p>
  <p><b><font color="red">Nota 4:</font> No procede su tr&aacute;mite, debido a que la superficie a utilizar rebasa los 240.00 m2.</b></p>
    
    <p><b><font color="red" size="4">ACLARACI&Oacute;N:</font> FAVOR DE PASAR A LA OFICINA DE ESTA DEPENDENCIA PARA SU RESOLUCION POR ESCRITO</b></p> <p><b> Tel:413 166-9000, ext. 223 Correo Electronico: <a href="mailto:desarrollourbanoapaseoa@gmail.com">desarrollourbanoapaseoa@gmail.com.</a></b></p>
 </div>
 </div>
 
  
  <br>  
  <br>
  

     

    <?php
}else{echo '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  NO EXISTE NINGUN REGISTRO CON ESTE FOLIO.
</div>';}

?>
	</tbody>
      </table>
	 
