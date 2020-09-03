<!DOCTYPE html>
<html>
<head>
	<title>Alteração de senha</title>
	<?php
		include_once '../classes/header.php';
	?>
</head>
<body>
	<form method="POST">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				Senha nova:
				<input type="password" name="senha1" required="" class="form-control"><br><br>
			</div>
		</div>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
					Confirmar Senha:
					<input type="password" required="" name="senha2" class="form-control"><br><br>
			</div>
			</div>
			<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" name="submit" value="Entrar" class="btn btn-block btn-primary">
				</div>
			</div>

</form>
	</div>

	<?php 
	include_once '../classes/connection.class.php';

	if($_POST){
		$senha1=$_POST['senha1'];
		$senha2=$_POST['senha2'];
		$id=$_SESSION['iduser'];
		if($senha1==$senha2 && $senha1!= '123'){
			$con=new conect();
			$con->action("UPDATE usuario SET senha='".md5($senha1)."' WHERE iduser=".$id." ");
			echo "<script>
		 				alert('Alterado com sucesso!');
		 				window.location.href = '../listar/listar_computadores.php';
		 			 </script>";
		}
		else if($senha1 != $senha2){
			echo ('<div class="row"> <br>
					<div class="col-sm-4 col-sm-offset-4"> <div class="alert alert-danger" role="alert">*As senhas não são iguais! </div> </div> </div>');
		}
		else if($senha1=='123'){
			echo ('<div class="row"> <br>
					<div class="col-sm-4 col-sm-offset-4"> <div class="alert alert-danger" role="alert">*A sua senha não pode ser essa! </div> </div> </div>');
		}
	}
	?>

</body>
</html>