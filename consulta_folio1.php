
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
  
    
   	
    <div  align="center"  class="col-md-6" id="inf"><p style=" margin:5px; color:#F7F3F3; font-size:20px;">La fecha de ingreso del tr&aacute;mite es:</p></div>
  <div  class="col-md-6" align="left" id="inf1"> <p style=" margin:5px; color:#000000; font-size:20px;"><?php echo "   ".$row['fecha']; ?></p></div>


  <div  align="center"  class="col-md-6" id="inf"><p style=" margin:5px; color:#F7F3F3; font-size:20px;">El estatus del tr&aacute;mite esta:</p></div>
  <div  class="col-md-6" align="left" id="inf1"> <p style="margin:5px; color:#000000; font-size:20px;"><?php echo "   ".$row['estatus']; ?></p></div>
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
	 
