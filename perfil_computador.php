
<?php
include_once 'classes/header.php';

$id = $_GET['id_comps'];

include_once 'classes/connection.class.php';
include_once 'classes/computadores.class.php';
$x = new computadores();
$x->set_novo_id($id);
$comp = $x->get_computador();
$row = $comp->fetch_array();
?>

<div class="col-sm-8 col-sm-offset-2">
	<h3>Informações</h3>
  <div class="col-sm-8 col-sm-offset-9">

<?php 

echo '<a  href="update_computador.php?id_comps='.$id.'" class="btn btn-primary " ><i class="fa fa-edit"></i></a>';
echo '<a  href="deletar_computador.php?id_comps='.$id.'" class="btn btn-danger" onclick="return confirm(\'Tem certeza que deseja deletar este computador?\');"><i class="fa fa-trash"></i></a>';
?>
</div>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Modelo</th>
      <th scope="col">Seção</th>
    
    </tr>
  </thead>
  <tbody>

<?php
echo '<th scope="row"></th>';
echo '<td>'.$row['nome'].'</td>';
echo '<td>'.$row['modelo'].'</td>';
echo '<td>'. $row['sessao'].'</td>';
?>
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

<?php
echo '<th scope="row"></th>';
echo '<td>'.$row['numero'].'</td>';
echo '<td>'.$row['nr_serie'].'</td>';
echo '<td>'. $row['configu'].'</td>';
?>
  </tbody>
</table>
<h3>Histórico</h3>
  

<?php

include_once 'classes/historico.class.php';
$y = new historico();
$y->set_novo_id($id);
$his = $y->get_historico();
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Alteração</th>
      <th scope="col">Data</th>
      <th scope="col"><?php
echo '<a  href="novo_historico.php?id_comps='.$id.'" class="btn btn-primary" ><i class="fa fa-plus-square"></i></a></div>'?></th>
    </tr>
  </thead>
  

<?php
while($row = $his->fetch_array()){
echo '<tbody><th scope="row"></th>';
echo '<td>'.$row['mudanca'].'</td>';
echo '<td>'.date('d/m/Y', strtotime($row['data_de'])).'</td>';
//echo '<td>'.$row['data_de'].'</td>';
echo '<td><a  href="deletar_historico.php?id_historic='.$row['id_historia'].'& id_comp='.$id.' " class="btn btn-danger" onclick="return confirm(\'Tem certeza que deseja deletar esta alteração?\');"><i class="fa fa-trash"></i></a></td>';
}

?>
  </tbody>
</table>
