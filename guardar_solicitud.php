<?php
if( $_POST['enviar']=='Enviar'){
include "conexion.php";
$sql="INSERT INTO tblsolicitud(sector,clasificacion,rsocial,destablecimiento,colonia,gdnegocio,ecivil,nestudios,tel,email,
tempresa,empleos,inversion,superficie,asunto,fecha,fnacimiento,fapertura,formtramite) 
VALUES ($_POST[opsector]','$_POST[clasificacion]','$_POST[rsocial]','$_POST[destablecimiento]','$_POST[col]','$_POST[giro]','$_POST[opecivil]','$_POST[nestudios]','$_POST[ntelefono]','$_POST[email]','$_POST[optempresa]','$_POST[empleos]','$_POST[inversion]','$_POST[superficie]','$_POST[asunto]','$_POST[fecha]','$_POST[fnacimiento]','$_POST[fapertura]','$_POST[formtramite]')";
mysql_query($sql);
session_start();
$_SESSION['folio_generado'] = mysql_insert_id(); 
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=documentos.php >');
}
?>
