<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>login</title>
<?php
include_once '../classes/header.php';
?>
</head>

<body>
<form method="POST">
<div class="col-sm-4 col-sm-offset-4">
	E-mail:
	<input type="text" name="login" required="" class="form-control"><br><br>
	Senha:
	<input type="password" required="" name="password" class="form-control"><br><br>
<input type="submit" name="submit" value="Entrar" class="btn btn-primary">
</form>
<?php
if ($_POST) {
	$l = $_POST['login'];
	$p = $_POST['password'];
	include_once '../classes/user.class.php';
$x = new user();
$x->set_info($l,$p);
$z = $x->login();

if($z == TRUE){
	header("Location: ../novos/novo_formulario.php");
}

}
?>
</body>
</html> 