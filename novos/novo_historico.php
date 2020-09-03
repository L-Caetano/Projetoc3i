<?php
include_once '../scripseguranca.php';
$z = new seguranca();
$z->seg_nivel();
$z->set_session_niveis();
$z->set_niveis_aceitos(1);
$z->testar();

$id = $_GET['id_comps'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registrar nova alteração</title>
<?php
include_once '../classes/header.php';
?>
</head>

<body>
	<div class="col-sm-4 col-sm-offset-4">
<form method="POST">
	Mudança:
	<input type="text" name="mudanca" class="form-control"><br>
	Data:
	<input type="date" name="date" class="form-control"><br>
	
<input type="submit" name="submit" value="upload" class="btn btn-primary">
</form>
<?php
if($_POST){
	include_once '../classes/connection.class.php';
	include_once '../classes/historico.class.php';
	$date = $_POST['date'];
	$mudanca = $_POST['mudanca'];
    $x = new historico();
    $x->set_new_historico($mudanca,$date);
    $x->set_novo_id($id);
    $x->new_historico();
     header("Location: ../perfil/perfil_computador.php?id_comps=".$id);
}
?>