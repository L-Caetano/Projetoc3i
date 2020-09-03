<?php
include_once '../scripseguranca.php';
$z = new seguranca();
$z->seg_nivel();
$z->set_session_niveis();
$z->set_niveis_aceitos(1);
$z->testar();
?>
<?php
include_once '../classes/header.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registrar novo computador</title>


</head>

<body>
	<div class="container">
	<center>
<h1>Registrar novo material</h1>
</center>
<form method="POST">
	<div class="col-sm-4 col-sm-offset-2">

	<h4>Seção:</h4>
	<input type="text" name="sessao" class="form-control"><br>	<h4>Configuração:</h4>

	<input type="text" name="modelo" class="form-control"><br>
	<h4>Modelo:</h4>


	<input type="text" name="config" class="form-control"><br>
	<input type="submit" name="submit" value="Enviar" class="btn btn-primary">
</div>
<div class="col-sm-4 ">
	<h4>Número de Série:</h4>
	<input type="text" name="nr_serie" class="form-control"><br>
	<h4>Número:</h4>
	<input type="text" name="numero" class="form-control"><br>
	<h4>Nome:</h4>

	<input type="text" name="nome" class="form-control"><br>

</div>

</form>
<?php
if($_POST){
include_once '../classes/computadores.class.php';
$sessao = $_POST['sessao'];
$modelo = $_POST['modelo'];
$config = $_POST['config'];
$nr_serie = $_POST['nr_serie'];
$numero = $_POST['numero'];
$nome = $_POST['nome'];
include_once '../classes/connection.class.php';
$x = new computadores();
$x->set_novo_computador($sessao,$modelo,$config,$nr_serie,$numero,$nome);
$x->enviar_comput();
}

?>	
</div>
