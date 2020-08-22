
<?php
include_once 'classes/header.php';

$id = $_GET['id_form'];

include_once 'classes/connection.class.php';
include_once 'classes/formulario.class.php';
$x = new formulario();
$x->set_id_formulario($id);
$form = $x->get_formulario();
$row = $form->fetch_array();
?>

<div class="col-sm-9">
	<h3>Informações</h3>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Texto</th>
      <th scope="col">Local</th>
    
    </tr>
  </thead>
  <form method="POST">
  <tbody>
    <th scope="row"></th>
<td><input type="text" name="titulo"  value="<?php echo $row['title'] ?>"></td>
<td><input type="text" name="texto"  value="<?php echo $row['texto'] ?>"></td>
<td><input type="text" name="local_os"  value="<?php echo $row['local_os'] ?>"></td>

  </tbody>

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data</th>
      <th scope="col">Hora</th>
      <th scope="col">Solução</th>
    
    </tr>
  </thead>
  <tbody>

<th scope="row"></th>

<td><input type="date" name="data1"  value="<?php echo $row['data1'] ?>"></td>
<td><input type="time" name="time"  value="<?php echo $row['hora'] ?>"></td>
<td><input type="text" name="solucao"  value="<?php echo $row['solucao_os'] ?>"></td>



  </tbody>
</table>
<input type="submit" name="submit" value="Salvar Mudanças" class="btn btn-primary">
</form>
<?php

if($_POST){
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$local_os = $_POST['local_os'];
$data1 = $_POST['data1'];
$time = $_POST['time'];
$solucao = $_POST['solucao'];
$x->set_formulario($data1,$time,$texto,$titulo,$ip,$prioridade,$local,$status);
//$x->update_comput($id);
header("Location: perfil_computador.php?id_comps=".$id);
}
?>  
  </tbody>
</table>
