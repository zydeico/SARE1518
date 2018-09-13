<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
$con=mysql_connect("localhost", "apaseoel_sare151", "Vur(IID1c1N;") or die("No se pudo conectar: " . mysql_error());
mysql_select_db("apaseoel_sare1518");

$f=utf8_decode($_POST['f']); 
$s=utf8_decode($_POST['s']); 
$c=utf8_decode($_POST['c']); 
$n=utf8_decode($_POST['n']); 
$d=utf8_decode($_POST['d']); 
$co=utf8_decode($_POST['co']); 
$g=utf8_decode($_POST['g']); 
$fn=utf8_decode($_POST['fn']); 
$e=utf8_decode($_POST['e']); 
$ne=utf8_decode($_POST['ne']); 
$t=utf8_decode($_POST['t']); 
$em=utf8_decode($_POST['em']); 
$te=utf8_decode($_POST['te']); 
$emp=utf8_decode($_POST['emp']); 
$i=utf8_decode($_POST['i']); 
$es=utf8_decode($_POST['es']); 
$ed=utf8_decode($_POST['ed']); 
$nt=utf8_decode($_POST['nt']); 
$id = $_GET['id']; 

//Creamos la sentencia SQL y la ejecutamos
$sSQL="Update tblsolicitud Set fecha='$f', sector='$s', clasificacion='$c', rsocial='$n',destablecimiento='$d',colonia='$co', gdnegocio='$g', fnacimiento='$fn', ecivil='$e', nestudios='$ne', tel='$t',email='$em',tempresa='$te' ,empleos='$emp', inversion='$i', estatus='$es', estdocument='$ed', nota='$nt' where folio='$id'";
mysql_query($sSQL);

echo'<div class="alert alert-success alert-dismissible" role="alert">
  	 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 <span class="glyphicon glyphicon-ok" aria-hidden="true"></span><META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >&nbsp;EL REGISTRO SE ACTUALIZO CORRECTAMENTE.</div>';
?>