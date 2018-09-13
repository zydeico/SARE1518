<?php 
	$no=$_POST['fol'];
	$no=3;
	$escritura=$no."_Contrato_de_Comodato.pdf";
	
	$contrato = file_exists("../documentos/".$escritura);

	if ($contrato==1)
		echo "<a href='../documentos/".$escritura."'>Escritura</a><br>"; 
?>