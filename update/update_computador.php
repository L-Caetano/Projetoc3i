<?php
include_once '../scripseguranca.php';
$z = new seguranca();
$z->seg_nivel();
$z->set_session_niveis();
$z->set_niveis_aceitos(1);

$z->testar();

include_once '../classes/header.php';

$id = $_GET['id_comps'];

include_once '../classes/connection.class.php';
include_once '../classes/computadores.class.php';
$x = new computadores();
$x->set_novo_id($id);
$comp = $x->get_computador();
$row = $comp->fetch_array();
?>

<div class="col-sm-9">
	<h3>Informações</h3>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Modelo</th>
      <th scope="col">Seção</th>
    
    </tr>
  </thead>
  <form method="POST">
  <tbody>
    <th scope="row"></th>
<td><input type="text" name="nome" class="form-control"  value="<?php echo $row['nome'] ?>"></td>
<td><input type="text" name="modelo" class="form-control"  value="<?php echo $row['modelo'] ?>"></td>
<td><input type="text" name="sessao" class="form-control"  value="<?php echo $row['sessao'] ?>"></td>

  </tbody>

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Número</th>
      <th scope="col">Número de Série</th>
      <th scope="col">Configuração</th>
    
    </tr>
  </thead>
  <tbody>

<th scope="row"></th>

<td><input type="text" name="numero" class="form-control"  value="<?php echo $row['numero'] ?>"></td>
<td><input type="text" name="nr_serie" class="form-control"  value="<?php echo $row['nr_serie'] ?>"></td>
<td><input type="text" name="config" class="form-control"  value="<?php echo $row['configu'] ?>"></td>



  </tbody>
</table>
<input type="submit" name="submit" value="Salvar Mudanças" class="btn btn-primary">
</form>
<?php
if($_POST){
$sessao = $_POST['sessao'];
$modelo = $_POST['modelo'];
$config = $_POST['config'];
$nr_serie = $_POST['nr_serie'];
$numero = $_POST['numero'];
$nome = $_POST['nome'];
$x->set_novo_computador($sessao,$modelo,$config,$nr_serie,$numero,$nome);
$x->update_comput($id);
header("Location: ../perfil/perfil_computador.php?id_comps=".$id);
}
?>  
<h3>Histórico</h3>
<?php
include_once '../classes/historico.class.php';
$y = new historico();
$y->set_novo_id($id);
$his = $y->get_historico();
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Mudança</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  

<?php
while($row = $his->fetch_array()){
echo '<tbody><th scope="row"></th>';
echo '<td>'.$row['mudanca'].'</td>';
echo '<td>'.date('d/m/Y', strtotime($row['data_de'])).'</td>';
//echo '<td>'.$row['data_de'].'</td>';
}

?>
  </tbody>
</table>
