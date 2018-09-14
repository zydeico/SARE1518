<?php
//BOTON DE LAS ESCRITURAS
if ($_POST['Subir_Escrituras']) {
$conexion = mysql_connect("","","");
mysql_select_db("sare",$conexion);

$fol=$_POST["fol"];
$target_path = "prueba/";
$nombre = $fol."_"."Escritura.pdf";
$target_path = $target_path . basename($nombre); 
if (empty($_FILES['input1a']['name'])) {
$error = "ERROR NO SELECCIONO NINGUN ARCHIVO";
print "<script>alert('$error')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');
}else{
if(move_uploaded_file($_FILES['input1a']['tmp_name'], $target_path)) 
{ 

$imagen_1 = basename($nombre);
$sql="Update tblsolicitud Set cescritura='$imagen_1' where folio='$fol'";
mysql_query($sql);
$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
print "<script>alert('$mens')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');
}else{
//echo "Ha ocurrido un error, trate de nuevo!";
}}}
//BOTON DEL ARRENDAMIENTO
elseif ($_POST['Subir_Contrato_de_Arrendamiento']) {
$conexion = mysql_connect("","","");
mysql_select_db("sare",$conexion);

$fol=$_POST["fol"];
$target_path = "prueba/";
$nombre = $fol."_"."Contrato_de_Arrendamiento.pdf";
$target_path = $target_path . basename($nombre); 
if (empty($_FILES['input1b']['name'])) {
$error = "ERROR NO SELECCIONO NINGUN ARCHIVO";
print "<script>alert('$error')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');
}else{
if(move_uploaded_file($_FILES['input1b']['tmp_name'], $target_path)) 
{ 
$imagen_2 = basename($nombre);
$sql="Update tblsolicitud Set ccarrendamiento='$imagen_2' where folio='$fol'";
mysql_query($sql);
$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
print "<script>alert('$mens')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');	
}else{
//echo "Ha ocurrido un error, trate de nuevo!";
} }}
//BOTON DE COMODATO
elseif ($_POST['Subir_Contrato_de_Comodato']) {
$conexion = mysql_connect("","","");
mysql_select_db("sare",$conexion);

$fol=$_POST["fol"];
$target_path = "prueba/";
$nombre = $fol."_"."Contrato_de_Comodato.pdf";
$target_path = $target_path . basename($nombre); 
if (empty($_FILES['input1c']['name'])) {
$error = "ERROR NO SELECCIONO NINGUN ARCHIVO";
print "<script>alert('$error')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');
}else{
if(move_uploaded_file($_FILES['input1c']['tmp_name'], $target_path)) 
{ 
$imagen_3 = basename($nombre);
$sql="Update tblsolicitud Set cccomodato='$imagen_3' where folio='$fol'";
mysql_query($sql);
$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
print "<script>alert('$mens')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');	
}else{
//echo "Ha ocurrido un error, trate de nuevo!";
} }}
//BOTON REVISION PREDIAL
elseif ($_POST['Subir_Revision_de_Predial']) {
$conexion = mysql_connect("","","");
mysql_select_db("sare",$conexion);

$fol=$_POST["fol"];
$target_path = "prueba/";
$nombre = $fol."_"."Revision_de_Predial.pdf";
$target_path = $target_path . basename($nombre); 
if (empty($_FILES['input1d']['name'])) {
$error = "ERROR NO SELECCIONO NINGUN ARCHIVO";
print "<script>alert('$error')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');
}else{
if(move_uploaded_file($_FILES['input1d']['tmp_name'], $target_path)) 
{ 
$imagen_4 = basename($nombre);
$sql="Update tblsolicitud Set rpredial='$imagen_4' where folio='$fol'";
mysql_query($sql);
$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
print "<script>alert('$mens')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');	
}else{
//echo "Ha ocurrido un error, trate de nuevo!";
} }}
//BOTON IDENTIFICACIÓN
elseif ($_POST['Subir_Copia_de_Identificacion']) {
$conexion = mysql_connect("","","");
mysql_select_db("sare",$conexion);

$fol=$_POST["fol"];
$target_path = "prueba/";
$nombre = $fol."_"."Identificacion.pdf";
$target_path = $target_path . basename($nombre); 
if (empty($_FILES['input1e']['name'])) {
$error = "ERROR NO SELECCIONO NINGUN ARCHIVO";
print "<script>alert('$error')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');
}else{
if(move_uploaded_file($_FILES['input1e']['tmp_name'], $target_path)) 
{ 
$imagen_5 = basename($nombre);
$sql="Update tblsolicitud Set cidentificacion='$imagen_5' where folio='$fol'";
mysql_query($sql);
$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
print "<script>alert('$mens')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');	
}else{
//echo "Ha ocurrido un error, trate de nuevo!";
} }}
//ACTA CONSTITUTIVA
elseif ($_POST['Subir_Copia_del_Acta_Constitutiva']) {
$conexion = mysql_connect("","","");
mysql_select_db("sare",$conexion);
$fol=$_POST["fol"];
$target_path = "prueba/";
$nombre = $fol."_"."Acta_Constitutiva.pdf";
$target_path = $target_path . basename($nombre); 
if (empty($_FILES['input1f']['name'])) {
$error = "ERROR NO SELECCIONO NINGUN ARCHIVO";
print "<script>alert('$error')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');
}else{
if(move_uploaded_file($_FILES['input1f']['tmp_name'], $target_path)) 
{ 
$imagen_6 = basename($nombre);
$sql="Update tblsolicitud Set caconstitutiva='$imagen_6' where folio='$fol'";
mysql_query($sql);
$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
print "<script>alert('$mens')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');	
}else{
//echo "Ha ocurrido un error, trate de nuevo!";
} }}

//PODER NOTARIAL
elseif ($_POST['Subir_Copia_Poder_Notarial']) {
$conexion = mysql_connect("","","");
mysql_select_db("sare",$conexion);
$fol=$_POST["fol"];
$target_path = "prueba/";
$nombre = $fol."_"."Poder_Notarial.pdf";
$target_path = $target_path . basename($nombre); 
if (empty($_FILES['input1g']['name'])) {
$error = "ERROR NO SELECCIONO NINGUN ARCHIVO";
print "<script>alert('$error')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');
}else{
if(move_uploaded_file($_FILES['input1g']['tmp_name'], $target_path)) 
{ 
$imagen_7 = basename($nombre);
$sql="Update tblsolicitud Set cpnotarial='$imagen_7' where folio='$fol'";
mysql_query($sql);
$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
print "<script>alert('$mens')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');	
}else{
//echo "Ha ocurrido un error, trate de nuevo!";
} }}

//Formato de Tramite
elseif ($_POST['Subir_Formato_de_Tramite']) {
    $conexion = mysql_connect("","","");
    mysql_select_db("sare",$conexion);
    $fol=$_POST["fol"];
    $target_path = "../documentos123/";
    $nombre = $fol."_"."Formato_de_Tramite.pdf";
    $target_path = $target_path . basename($nombre); 
    if(move_uploaded_file($_FILES['input1g']['tmp_name'], $target_path)) 
    { 
    $imagen_7 = basename($nombre);
    $sql="Update tblsolicitud Set formtramite='$imagen_7' where folio='$fol'";
    mysql_query($sql);
    $mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
    print "<script>alert('$mens')</script>";
    print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >');	
    }else{
    //echo "Ha ocurrido un error, trate de nuevo!";
    }}
?>