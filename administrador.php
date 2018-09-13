<?php
session_start();
//echo $_SESSION["id_empresa"];
//echo $_SESSION['usuario'];
if($_SESSION["nivel"]!="1"){
$mens = "Acceso denegado a este sitio"; 
print "<script>alert('$mens')</script>";
print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=index.php >');
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrador</title>
<link rel="shortcut icon" href="" />
<link href="assets/bootstrap.css" rel="stylesheet">
</head>
<body background="img/fondo-apaseo.jpg">
<p><br/></p>
<div class="container">
<span style="color:#373435; font-size:18px;">Buscar por:</span>
<div class="row">
<div class="col-md-3">
<div class="input-group">
<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-list-alt"></span> Folio</span>
<!--<input type="date" name="calendario" id="calendario" class="form-control fechas" placeholder="" aria-describedby="sizing-addon2">-->
<input type="texto" name="folio"  class="form-control fechas" id="folio" >
</div></div>

<div class="col-md-3">
<div class="input-group">
<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-tasks"></span> Estatus</span>
<select class="form-control" id="estatus" name="estatus">
		  <option value=""> </option>
          <option value=""></option>
          <option value="Pendiente"> Pendiente </option>
		  <option value="Cancelado"> Cancelado</option>
		  <option value="Finalizado"> Finalizado </option>
          </select>
</div>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="submit" class="btn btn-primary" name="Submit" value="Ver Solicitud" onClick="viewdata()">
</div></div>
<div class="col-md-1">
<div class="input-group">
</div></div>
</div>
<br/><br/><br/>
<div id="info"></div>
<div id="viewdata"><?php include 'getdata1.php'; ?></div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function viewdata(){
	var folio = $("#folio").val();
	var estatus = $("#estatus").val();
       $.ajax({
	   type: "GET",
	   data:{tipofolio:folio,tipoestatus:estatus},
	   url: "getdata.php"
      }).done(function( data ) {
	  $('#viewdata').html(data);
      });
    }
	
	function updatedata(str){
	
	var id = str;
	var f = $('#f'+str).val();
	var s = $('#s'+str).val();
	var c = $('#c'+str).val();
	var n = $('#n'+str).val();
	var d = $('#d'+str).val();
	var co= $('#co'+str).val();
	var g = $('#g'+str).val();
	var fn = $('#fn'+str).val();
	var e = $('#e'+str).val();
	var ne = $('#ne'+str).val();
	var t = $('#t'+str).val();
	var em = $('#em'+str).val();
	var  te= $('#te'+str).val();
	var  emp= $('#emp'+str).val();
	var  i= $('#i'+str).val();
	var  es= $('#es'+str).val();
	var  ed= $('#ed'+str).val();
	var  nt= $('#nt'+str).val();
	
	
		var datas="f="+f+"&s="+s+"&c="+c+"&n="+n+"&d="+d+"&co="+co+"&g="+g+"&fn="+fn+"&e="+e+"&ne="+ne+"&t="+t+"&em="+em+"&te="+te+"&emp="+emp+"&i="+i+"&es="+es+"&ed="+ed+"&nt="+nt;
	
	//var datas="f="+f+"&s="+s+"&c="+c+"&n="+n+"&d="+d"&co="+co"&g="+g"&fn="+fn"&e="+e"&ne="+ne"&t="+t"&em="+em"&te="+te"&emp="+emp"&i="+i"&es="+es;
      
	$.ajax({
	   type: "POST",
	   url: "updatedata.php?id="+id,
	   data: datas
	}).done(function( data ) {
	  $('#info').html(data);
	  viewdata();
	});
    }

	</script>
	
</body>
</html> 

<?php }?>