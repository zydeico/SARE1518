<?php
$conexion=mysql_connect('localhost','apaseoel_sare151','Vur(IID1c1N;');
mysql_select_db("apaseoel_sare1518",$conexion);
function protect ($v){
	$v=mysql_real_escape_string($v);
	$v=htmlentities($v, ENT_QUOTES);
	$v=trim($v);
	echo"entro conexion";
	return $v;}
?>