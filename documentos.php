<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title> </title>
<link rel="icon" type="image/png" href="img/ico.png" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


<?php

include "conexion.php";
$foliou=$_SESSION['folio_generado'];;

$sql = "SELECT * FROM tblsolicitud  WHERE folio='$foliou'";

$result = mysql_query ($sql);
// verificamos que no haya error
if ( !$result )
     die ("Error ejecutando la consulta");
    
    
    $num_filas = mysql_num_rows($result);
    
    if ($num_filas > 0){        
        $fila = mysql_fetch_array($result);
        }
?>

<body background="img/fondo_salamanca.png">
<div class="container">
<!-- Header -->
<div class="panel panel-default">
<div style="background-color:#334e87; border-color:#042944;" class="panel-heading">
<div align="center"><img src="img/sare_header_1.png" class="img-rounded img-responsive" ></div>
</div>
<!-- Finish Header -->
<!-- Body -->
<form action="" method="post" enctype="multipart/form-data" name="inscripcion" >
<div class="panel-body">
<h3 align="center" style="color:color:#042944;">DIRECCION DE DESARROLLO URBANO, ECOLOG&Iacute;A Y PLANEACI&Oacute;N DE <p>APASEO EL ALTO, GTO</p></h3>
<p align="center" style="font-size:20px;">SARE</p><br />
<p align="left" style="font-size:15px;">* Dependiendo de tu tramite necesitas subir la documentaci&oacute;n correspondiente (persona f&iacute;sica o moral).</p><br />


	<div class="row">
      <div class="col-md-3">
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2" style="font-size:16px; font-weight:bold;" >Folio</span>
          <input name="rsocial"  type="text" class="form-control" readonly="readonly" placeholder="" aria-describedby="sizing-addon2"  value="<?php echo $_SESSION['folio_generado']; ?>"required>
        </div>
      </div>
    </div>    
    
   <br />

<div class="row">

<div class="col-md-6">
    <label class="control-label" for="archivo">Adjuntar Archivo </label><span style="font-size:13px; font-style:italic;"> (Puedes adjuntar archivos con un  formato PDF no mayores a 15MB)</span><br/>
<div class="input-group">
<div  style="background:rgba(231,231,231,1.00); padding:8px;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;">
	<p></p>
    <span class="input-group" id="sizing-addon2" style="font-size:16px; font-weight:bold;"> Copia de Escrituras</span>
	  <input type="file"  class="form-control-addon" placeholder="" aria-describedby="sizing-addon2"  name="archivo[]" multiple><br />
      <button class="btn btn-sm btn-primary" type="submit" name="enviar" value="Enviar">Subir Escrituras</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="checkbox"  data-toggle="toggle" data-size="small" data-on="<i class='glyphicon glyphicon-ok'></i>"  data-off="<i class='glyphicon glyphicon-remove'></i>" data-onstyle="success"
	  <?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Escritura.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED /></label>
            <br>
	  
	  <?php
    # definimos la carpeta destino
    $carpetaDestino="../documentos123/";
 
    # si hay algun archivo que subir
    if($_FILES["archivo"]["name"][0])
    {
	
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["archivo"]["name"]);$i++)
        {
 
            # si es un formato de pdf
            if($_FILES["archivo"]["type"][$i]=="application/pdf" )
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["archivo"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
					$destino=$carpetaDestino.$_SESSION[folio_generado]."_"."Escritura.pdf";
 
                    # movemos el archivo
					
                    if(@move_uploaded_file($origen, $destino))
                    {
						//unlink($origen);
					    //echo "<br>".$_FILES["archivo"]["name"][$i]." movido correctamente";
                        //echo "<br>"." Guardado Exitosamente";
						
						$conexion = mysql_connect("","","");
     					mysql_select_db("",$conexion);
						
						//$nombre=$_SESSION[folio_generado].$_FILES["archivo"]["name"][$i];
						$escritura=$_SESSION[folio_generado]."_"."Escritura".".pdf";
						$sql="UPDATE tblsolicitud SET cescritura='$escritura' WHERE folio='$_SESSION[folio_generado]'";
						mysql_query($sql);
						$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
						print "<script>alert('$mens')</script>";
						print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=documentos.php>');
						
				     }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["archivo"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }else{
                echo '<p></p>';
				echo "<p style='color:red;'>".$_FILES["archivo"]["name"][$i]." - NO es un archivo PDF"."</p>";
				
            }
        }
    }else{
      // echo "<br>No se ha subido ninguna imagen";
    }
	?>
    </div>
    </div> 
        
</div>

    
    <div class="col-md-6">
     <br />
		<div class="input-group">
			<div  style="background:rgba(231,231,231,1.00); padding:8px;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;">
			<p></p>
    		<span class="input-group" id="sizing-addon2" style="font-size:16px; font-weight:bold;"> Copia de Identificaci&oacute;n</span>
	 		 <input type="file"  class="form-control-addon" placeholder="" aria-describedby="sizing-addon2" name="identificacion[]" multiple><br />
      		<button class="btn btn-sm btn-primary" type="submit" name="enviar" value="Enviar">Subir Identificaci&oacute;n</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <input type="checkbox"  data-toggle="toggle" data-size="small" data-on="<i class='glyphicon glyphicon-ok'></i>"  data-off="<i class='glyphicon glyphicon-remove'></i>" data-onstyle="success"
	  <?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Identificacion.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED /></label>
            <br>
			<?php

    # definimos la carpeta destino
    $carpetaDestino="../documentos123/";
 
    # si hay algun archivo que subir
    if($_FILES["identificacion"]["name"][0])
    {
	
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["identificacion"]["name"]);$i++)
        {
 
            # si es un formato de pdf
            if($_FILES["identificacion"]["type"][$i]=="application/pdf" )
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
					
                    $origen=$_FILES["identificacion"]["tmp_name"][$i];
					$destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
					$destino=$carpetaDestino.$_SESSION[folio_generado]."_"."Identificacion.pdf";
					
                   
                    # movemos el archivo
					
                    if(@move_uploaded_file($origen, $destino))
                    {
                        //echo "<br>".$_FILES["identificacion"]["name"][$i]." movido correctamente";
						
						$conexion = mysql_connect("","","");
     					mysql_select_db("",$conexion);
						//$nombre=$_SESSION[folio_generado].$_FILES["arrendamiento"]["name"][$i];
						$identificacion=$_SESSION[folio_generado]."_"."Identificacion".".pdf";
						$sql="UPDATE tblsolicitud SET cidentificacion='$identificacion' WHERE folio='$_SESSION[folio_generado]'";
						mysql_query($sql);
						$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
						print "<script>alert('$mens')</script>";
						print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=documentos.php>');
						
				     }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["identificacion"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }else{
				 echo '<p></p>';
				echo "<p style='color:red;'>".$_FILES["identificacion"]["name"][$i]." - NO es un archivo PDF"."</p>";
                
				
            }
        }
    }else{
        //echo "<br>No se ha subido ninguna imagen";
    }
    ?>  

    		</div>
    	</div>      
	</div>
    
</div>

<div class="row">

<div class="col-md-6">
	<div class="input-group">
		<div  style="background:rgba(231,231,231,1.00); padding:8px;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;">
		<p></p>
        <span class="input-group" id="sizing-addon2"  style="font-size:16px; font-weight:bold;"> Copia de Contrato Arrendamiento</span>
	  	<input type="file"  class="form-control-addon" placeholder="" aria-describedby="sizing-addon2" name="arrendamiento[]" multiple><br />
      	<button class="btn btn-sm btn-primary" type="submit" name="enviar" value="Enviar">Subir Contrato de Arrendamiento</button>
        &nbsp;&nbsp;
        <input type="checkbox"  data-toggle="toggle" data-size="small" data-on="<i class='glyphicon glyphicon-ok'></i>"  data-off="<i class='glyphicon glyphicon-remove'></i>" data-onstyle="success"
		
		<?php $file ='../documentos123/'.$_SESSION[folio_generado]."_"."Contrato_de_arrendamiento.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED /></label>
            <br>
            
		<?php 
    # definimos la carpeta destino
    $carpetaDestino="../documentos123/";
 
    # si hay algun archivo que subir
    if($_FILES["arrendamiento"]["name"][0])
    {
	
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["arrendamiento"]["name"]);$i++)
        {
 
            # si es un formato de pdf
            if($_FILES["arrendamiento"]["type"][$i]=="application/pdf" )
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
					
                    $origen=$_FILES["arrendamiento"]["tmp_name"][$i];
					$destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
					$destino=$carpetaDestino.$_SESSION[folio_generado]."_"."Contrato_de_arrendamiento.pdf";
					
                   
                    # movemos el archivo
					
                    if(@move_uploaded_file($origen, $destino))
                    {
                     //   echo "<br>".$_FILES["arrendamiento"]["name"][$i]." movido correctamente";
						
						$conexion = mysql_connect("","","");
     					mysql_select_db("",$conexion);
						//$nombre=$_SESSION[folio_generado].$_FILES["arrendamiento"]["name"][$i];
						$arrendamiento=$_SESSION[folio_generado]."_"."Contrato_de_arrendamiento".".pdf";
						$sql="UPDATE tblsolicitud SET ccarrendamiento='$arrendamiento' WHERE folio='$_SESSION[folio_generado]'";
						mysql_query($sql);
						$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
						print "<script>alert('$mens')</script>";
						print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=documentos.php>');
						
				     }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["arrendamiento"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }else{
				 echo '<p></p>';
				echo "<p style='color:red;'>".$_FILES["arrendamiento"]["name"][$i]." - NO es un archivo PDF"."</p>";
               
				
            }
        }
    }else{
        //echo "<br>No se ha subido ninguna imagen";
    }
    ?>
    	</div>
    </div>      
</div>

    <div class="col-md-6">
		<div class="input-group">
			<div  style="background:rgba(231,231,231,1.00); padding:8px;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;">
			<p></p>
    		    <span class="input-group" id="sizing-addon2"  style="font-size:16px; font-weight:bold;"> Copia del Acta constitutiva</span>
	 			<input type="file"  class="form-control-addon" placeholder="" aria-describedby="sizing-addon2" name="aconstitutiva[]" multiple><br />
      			<button class="btn btn-sm btn-primary" type="submit" name="enviar" value="Enviar">Subir Acta Constitutiva </button>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox"  data-toggle="toggle" data-size="small" data-on="<i class='glyphicon glyphicon-ok'></i>"  data-off="<i class='glyphicon glyphicon-remove'></i>" data-onstyle="success"
			<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Acta_Constitutiva.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED /></label>
                
				<?php
    # definimos la carpeta destino
    $carpetaDestino="../documentos123/";
 
    # si hay algun archivo que subir
    if($_FILES["aconstitutiva"]["name"][0])
    {
	
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["aconstitutiva"]["name"]);$i++)
        {
 
            # si es un formato de pdf
            if($_FILES["aconstitutiva"]["type"][$i]=="application/pdf" )
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
					
                    $origen=$_FILES["aconstitutiva"]["tmp_name"][$i];
					$destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
					$destino=$carpetaDestino.$_SESSION[folio_generado]."_"."Acta_Constitutiva.pdf";
					
                   
                    # movemos el archivo
					
                    if(@move_uploaded_file($origen, $destino))
                    {
                        //echo "<br>".$_FILES["aconstitutiva"]["name"][$i]." movido correctamente";
						
						$conexion = mysql_connect("","","");
     					mysql_select_db("",$conexion);
						//$nombre=$_SESSION[folio_generado].$_FILES["arrendamiento"]["name"][$i];
						$aconstitutiva=$_SESSION[folio_generado]."_"."Acta_Costitutiva".".pdf";
						$sql="UPDATE tblsolicitud SET caconstitutiva='$aconstitutiva' WHERE folio='$_SESSION[folio_generado]'";
						mysql_query($sql);
						$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
						print "<script>alert('$mens')</script>";
						print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=documentos.php>');
						
				     }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["aconstitutiva"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }else{
				 echo '<p></p>';
				echo "<p style='color:red;'>".$_FILES["aconstitutiva"]["name"][$i]." - NO es un archivo PDF"."</p>";
                echo "".$_FILES[""]["name"][$i]." - NO es un archivo PDF";
				
            }
        }
    }else{
        //echo "<br>No se ha subido ninguna imagen";
    }
    ?>
    		</div>
    	</div>      
	</div>
    
</div>
<div class="row">

<div class="col-md-6">
	<div class="input-group">
		<div  style="background:rgba(231,231,231,1.00); padding:8px;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;">
		<p></p>
        <span class="input-group" id="sizing-addon2"  style="font-size:16px; font-weight:bold;"> Copia de Contrato de Comodato</span>
	  	<input type="file"  class="form-control-addon" placeholder="" aria-describedby="sizing-addon2" name="comodato[]" multiple><br />
      	<button class="btn btn-sm btn-primary" type="submit" name="enviar" value="Enviar">Subir Contrato de Comodato</button>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox"  data-toggle="toggle" data-size="small" data-on="<i class='glyphicon glyphicon-ok'></i>"  data-off="<i class='glyphicon glyphicon-remove'></i>" data-onstyle="success"
                  
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Contrato_de_Comodato.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED /></label>

<?php 

    # definimos la carpeta destino
    $carpetaDestino="../documentos123/";
 
    # si hay algun archivo que subir
    if($_FILES["comodato"]["name"][0])
    {
	
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["comodato"]["name"]);$i++)
        {
 
            # si es un formato de pdf
            if($_FILES["comodato"]["type"][$i]=="application/pdf" )
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
					
                    $origen=$_FILES["comodato"]["tmp_name"][$i];
					$destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
					$destino=$carpetaDestino.$_SESSION[folio_generado]."_"."Contrato_de_Comodato.pdf";
					
                   
                    # movemos el archivo
					
                    if(@move_uploaded_file($origen, $destino))
                    {
                        //echo "<br>".$_FILES["comodato"]["name"][$i]." movido correctamente";
						
						$conexion = mysql_connect("","","");
     					mysql_select_db("",$conexion);
						//$nombre=$_SESSION[folio_generado].$_FILES["arrendamiento"]["name"][$i];
						$comodato=$_SESSION[folio_generado]."_"."Contrato_de_comodato".".pdf";
						$sql="UPDATE tblsolicitud SET cccomodato='$comodato' WHERE folio='$_SESSION[folio_generado]'";
						mysql_query($sql);
						$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
						print "<script>alert('$mens')</script>";
						print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=documentos.php>');
						
				     }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["comodato"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }else{
                 echo '<p></p>';
				echo "<p style='color:red;'>".$_FILES["comodato"]["name"][$i]." - NO es un archivo PDF"."</p>";
				
            }
        }
    }else{
        //echo "<br>No se ha subido ninguna imagen";
    }
    ?> 
    	</div>
    </div>      
</div>

     <div class="col-md-6">
		<div class="input-group">
			<div  style="background:rgba(231,231,231,1.00); padding:8px;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;">
			<p></p>
    		    <span class="input-group" id="sizing-addon2"  style="font-size:16px; font-weight:bold;"> Copia Poder Notarial</span>
	  			<input type="file"  class="form-control-addon" placeholder="" aria-describedby="sizing-addon2" name="pnotarial[]" multiple><br />
      			<button class="btn btn-sm btn-primary" type="submit" name="enviar" value="Enviar">Subir Poder Notarial </button>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox"  data-toggle="toggle" data-size="small" data-on="<i class='glyphicon glyphicon-ok'></i>"  data-off="<i class='glyphicon glyphicon-remove'></i>" data-onstyle="success"
        
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Poder_Notarial.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED /></label>
            <br>
				<?php
    # definimos la carpeta destino
    $carpetaDestino="../documentos123/";
 
    # si hay algun archivo que subir
    if($_FILES["pnotarial"]["name"][0])
    {
	
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["pnotarial"]["name"]);$i++)
        {
 
            # si es un formato de pdf
            if($_FILES["pnotarial"]["type"][$i]=="application/pdf" )
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
					
                    $origen=$_FILES["pnotarial"]["tmp_name"][$i];
					$destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
					$destino=$carpetaDestino.$_SESSION[folio_generado]."_"."Poder_Notarial.pdf";
					
                   
                    # movemos el archivo
					
                    if(@move_uploaded_file($origen, $destino))
                    {
                       // echo "<br>".$_FILES["pnotarial"]["name"][$i]." Guardado Exitosamente";
						
						$conexion = mysql_connect("","","");
     					mysql_select_db("",$conexion);
						//$nombre=$_SESSION[folio_generado].$_FILES["arrendamiento"]["name"][$i];
						$pnotarial=$_SESSION[folio_generado]."_"."Poder_Notarial".".pdf";
						$sql="UPDATE tblsolicitud SET cpnotarial='$pnotarial' WHERE folio='$_SESSION[folio_generado]'";
						mysql_query($sql);
						
       
						//$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
				
				     }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["pnotarial"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }else{
				 echo '<p></p>';
				echo "<p style='color:red;'>".$_FILES["pnotarial"]["name"][$i]." - NO es un archivo PDF"."</p>";
               
				
            }
        }
    }else{
        //echo "<br>No se ha subido ninguna imagen";
    }
    ?>
    		</div>
    	</div>      
	</div>
  </div> 
<div class="row">
    <div class="col-md-6">
		<div class="input-group">
			<div  style="background:rgba(231,231,231,1.00); padding:8px;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;">
			<p></p>
    		    <span class="input-group" id="sizing-addon2"  style="font-size:16px; font-weight:bold;"> Copia Formato de Apertura</span>
	  			<input type="file"  class="form-control-addon" placeholder="" aria-describedby="sizing-addon2" name="fapertura[]" multiple><br />
      			<button class="btn btn-sm btn-primary" type="submit" name="enviar" value="Enviar">Subir Formato de Apertura </button>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox"  data-toggle="toggle" data-size="small" data-on="<i class='glyphicon glyphicon-ok'></i>"  data-off="<i class='glyphicon glyphicon-remove'></i>" data-onstyle="success"
        
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Formato_Apertura.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED /></label>
            <br>
				<?php
    # definimos la carpeta destino
    $carpetaDestino="../documentos123/";
 
    # si hay algun archivo que subir
    if($_FILES["fapertura"]["name"][0])
    {
	
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["fapertura"]["name"]);$i++)
        {
 
            # si es un formato de pdf
            if($_FILES["fapertura"]["type"][$i]=="application/pdf" )
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
					
                    $origen=$_FILES["fapertura"]["tmp_name"][$i];
					$destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
					$destino=$carpetaDestino.$_SESSION[folio_generado]."_"."Formato_Apertura.pdf";
					
                   
                    # movemos el archivo
					
                    if(@move_uploaded_file($origen, $destino))
                    {
                       // echo "<br>".$_FILES["pnotarial"]["name"][$i]." Guardado Exitosamente";
						
						$conexion = mysql_connect("","","");
     					mysql_select_db("",$conexion);
						//$nombre=$_SESSION[folio_generado].$_FILES["arrendamiento"]["name"][$i];
						$pnotarial=$_SESSION[folio_generado]."_"."Formato_Apertura".".pdf";
						$sql="UPDATE tblsolicitud SET fapertura='$pnotarial' WHERE folio='$_SESSION[folio_generado]'";
						mysql_query($sql);
						
       
						//$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
				
				     }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["fapertura"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }else{
				 echo '<p></p>';
				echo "<p style='color:red;'>".$_FILES["pnotarial"]["name"][$i]." - NO es un archivo PDF"."</p>";
               
				
            }
        }
    }else{
        //echo "<br>No se ha subido ninguna imagen";
    }
    ?>
    		</div>
    	</div>      
	</div>
  </div> 
    
    

<div class="col-md-6">
	<div class="input-group">
		<div  style="background:rgba(231,231,231,1.00); padding:8px;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;">
		<p></p>
        <span class="input-group" id="sizing-addon2"  style="font-size:16px; font-weight:bold;"> Revisi&oacute;n de Predial</span>
	    <input type="file"  class="form-control-addon" placeholder="" aria-describedby="sizing-addon2" name="predial[]" multiple><br />
        <button class="btn btn-sm btn-primary" type="submit" name="enviar" value="Enviar">Subir Revisi&oacute;n de Predial</button>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox"  data-toggle="toggle" data-size="small" data-on="<i class='glyphicon glyphicon-ok'></i>"  data-off="<i class='glyphicon glyphicon-remove'></i>" data-onstyle="success"
       
           	<?php 
  			$file ='../documentos123/'.$_SESSION[folio_generado]."_"."Revision_de_Predial.pdf";
    		//Devuelve true
     		$exists = file_exists( $file );
	  
	 		if( $exists =='1') print "checked=true"?> DISABLED /></label>
		<?php

    # definimos la carpeta destino
    $carpetaDestino="../documentos123/";
 
    # si hay algun archivo que subir
    if($_FILES["predial"]["name"][0])
    {
	
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["predial"]["name"]);$i++)
        {
 
            # si es un formato de pdf
            if($_FILES["predial"]["type"][$i]=="application/pdf" )
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
					
                    $origen=$_FILES["predial"]["tmp_name"][$i];
					$destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
					$destino=$carpetaDestino.$_SESSION[folio_generado]."_"."Revision_de_Predial.pdf";
					
                   
                    # movemos el archivo
					
                    if(@move_uploaded_file($origen, $destino))
                    {
                       // echo "<br>".$_FILES["predial"]["name"][$i]." movido correctamente";
						
						$conexion = mysql_connect("","","");
     					mysql_select_db("",$conexion);
						//$nombre=$_SESSION[folio_generado].$_FILES["arrendamiento"]["name"][$i];
						$predial=$_SESSION[folio_generado]."_"."Revision_de_Predial".".pdf";
						$sql="UPDATE tblsolicitud SET rpredial='$predial' WHERE folio='$_SESSION[folio_generado]'";
						mysql_query($sql);
						$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO";
						print "<script>alert('$mens')</script>";
						print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=documentos.php>');
						
				     }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["predial"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }else{
                echo '<p></p>';
				echo "<p style='color:red;'>".$_FILES["predial"]["name"][$i]." - NO es un archivo PDF"."</p>";
				
            }
        }
    }else{
        //echo "<br>No se ha subido ninguna imagen";
    }
    ?>
    	</div>
    </div>      
</div>

</div>
<!-- Finish Body -->

</div>

</form>
<form action="generarfolio.php" method="post">
<button class="btn btn-lg btn-primary" type="submit" name="enviar" value="Enviar">Continuar</button>
</form>
</div>
</div>	
</body>
</html>