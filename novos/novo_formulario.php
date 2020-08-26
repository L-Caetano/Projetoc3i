<?php 
//$id = $_GET['id_comps'];

?>
<?php
include_once '../classes/header.php';

?>
<!DOCTYPE html>
<html>
<head>
	
<meta charset="UTF-8">
<title>Ordem de serviço</title>

</head>

<body>
<div class="container">
<div><center>
	<h1>Ordem de serviço</h1></center>

	
<form method="post">
	<div class="col-sm-4 col-sm-offset-2">
	<h4>Titulo:</h4>
	<input type="text" name="title" class="form-control">
    <br>
   <h4> Descrição:</h4>
    <textarea name="editor" id="editor" class="form-control" rows="5" cols="40">
    </textarea>
    <br>
     <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
</div>
<div class="col-sm-4">
   <h4> Local:</h4>
     <input type="text" name="local" class="form-control"><br>
     <h4>Prioridade:</h4>
     <select name="prioridade" class="form-control">
          <option value="Baixa">Baixa</option>
          <option value="Média">Media</option>
          <option value="Alta">Alta</option>
         
        </select>
<br>
   
</div>
</form>
<?php
if($_POST){
	$editor = $_POST['editor'];
	$title = $_POST['title'];
 date_default_timezone_set('America/Sao_Paulo');
	$horario = date("H:i");
	$data1 = date("Y/m/d");
	$ip = $_SERVER['REMOTE_ADDR'];
	$prioridade = $_POST['prioridade'];
	$local = $_POST['local'];
	$status = 2;

include_once '../classes/formulario.class.php';
$x = new formulario();
$x->set_formulario($data1,$horario,$editor,$title,$ip,$prioridade,$local,$status,null);
$x->up_formulario();
}


?>
</div>

