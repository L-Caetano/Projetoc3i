<?php
include_once '../scripseguranca.php';
$z = new seguranca();
$z->seg_nivel();
$z->set_session_niveis();
$z->set_niveis_aceitos(1);
$z->set_niveis_aceitos(2);
$z->testar();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Perfil Usuário</title>
<?php 
include_once '../classes/header.php'; 
include_once '../classes/connection.class.php';
include_once '../classes/user.class.php';
include_once '../classes/formulario.class.php';
$x = new user();
$iduser = $_GET['iduser'];
$x->set_user_id($iduser);
$result = $x->get_user();
$z = new formulario();
$z->set_user_id($iduser);
$r = $z->meus_formularios();
//$row = $result->fetch_array();
$y=0;
?>
</head>
<body>
<div class="container">
		<div class="col-sm-8 col-sm-offset-1">
<?php if($_SESSION['iduser'] == $iduser){ ?>
<h1>Bem vindo: <?php echo $result; ?>!!</h1></div>
<?php }else{
	?>
	<h1>Perfil de: <?php echo $result; ?></h1></div>
<?php
}
?>
	<div class="col-sm-8 col-sm-offset-2">
		<br>
 <h2>Minhas ordens:</h2>
 <?php
if($r == false){
echo '<div class="col-sm-8 col-sm-offset-2">
          <h4>Nenhuma ordem efetuada</h4>';
}else{
?>
 <table class="table">
  <thead>
    <tr>
        <th scope="col"></th>
      <th scope="col">Senha</th>
      <th scope="col">Titulo</th>
      <th scope="col">Data/Hora</th>
        <?php if($_SESSION['iduser'] == $iduser){?>  
      <th scope="col"> <a  href="../novos/novo_formulario.php" class="btn btn-primary" > <i class="fa fa-plus-square"></i></a></th>
      <?php 
}else{
	echo '<th scope="col"></th>';
}
      ?>
    </tr>
  </thead>
  <tbody>
	<?php 
   //   echo "<h1>".$row['nome'].'</h1><br>';
   //   echo "<h2>".$row['email'].'</h2><br>';
	while($row=$r->fetch_array()){
	echo '<tr>
  <th scope="row"></th>
      <th >#'.$row['id_formulario'].'</th>
      <td><b>'.ucfirst($row['title']).'</b></td>
      <td>'.date('d/m/Y',strtotime($row['data1'])).' - '.date('H:i', strtotime($row['hora'])).'</td>
      
      ';
	$y = $row['id_formulario'];
	echo ' <div class="w3-container">
 <td>
  <button onclick="document.getElementById(\''.$y.'\').style.display=\'block\'" class="btn btn-primary">Detalhes...</button>
</td>
  <div id="'.$y.'" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById(\''.$y.'\').style.display=\'none\'" class="w3-button w3-display-topright">&times;</span>
        <p><h2>'.ucfirst($row['title']).'    #'.$row['id_formulario'].'</h2></p><hr>
        <h4>Descrição</h4>
        <p>'.ucfirst($row['texto']).'</p>
        <h4>Local</h4>
        <p>'.$row['local_os'].'</p>

        <h4>Prioridade</h4>
        <p>'.$row['prioridade_os'].'</p>
        <h4>Status</h4>
        <p>'.$row['status_os'].'</p>';
    
echo '<div class="col-sm-5 col-sm-offset-9">
<a  href="../update/update_formulario.php?id_form='.$row['id_formulario'].'" class="btn btn-primary " ><i class="fa fa-edit"></i></a>';
echo '<a  href="../scripts/deletar_formulario.php?id_form='.$row['id_formulario'].'" class="btn btn-danger" onclick="return confirm(\'Tem certeza que deseja deletar este ordem?\');"><i class="fa fa-trash"></i></a></div><br>';
      
       echo' <hr><p>Em '.date('d/m/Y',strtotime($row['data1'])).' - '.date('H:i', strtotime($row['hora'])).' - Ip: '.$row['ip_os'].'</p>
      </div>
    </div>
  </div>
</div>';
	$y = $y+1;
}
}
	?>

</div>
</body>
</html>