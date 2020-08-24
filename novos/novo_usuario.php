<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>new user</title>
<?php
include_once '../classes/header.php';
?>
</head>

<body>
<form method="POST">
	<div class="col-sm-4 col-sm-offset-4">
	Nome:
	<input type="text" name="nome" class="form-control">
	E-mail:
	<input type="text" name="email" class="form-control">
	Senha:
	<input type="password" name="password" class="form-control">
	Cargo:
	<input type='' class="form-control">

	<br><br>
<button type="submit" name="submit" value="Registrar" class="btn btn-primary" >Registrar</button></div>
</form>
<?php
if ($_POST) {
    $n = $_POST['nome'];
	$e = $_POST['email'];
	$p = $_POST['password'];
	include_once '../classes/user.class.php';
$x = new user();
$x->set_info($e,$p);
$x->upload_new_user();
}
?>
</body>

</html> 