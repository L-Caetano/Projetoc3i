
<?php
include_once '../classes/header.php';

$id = $_GET['id_form'];

include_once '../classes/connection.class.php';
include_once '../classes/formulario.class.php';
$x = new formulario();
$x->set_id_formulario($id);
$form = $x->get_formulario();
$row = $form->fetch_array();
?>

<div class="col-sm-8 col-sm-offset-2">
	<h3>Informações</h3>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Texto</th>
      <th scope="col">Local</th>
    <th scope="col">Prioridade</th>
    </tr>
  </thead>
  <form method="POST">
  <tbody>
    <th scope="row"></th>
<td><input type="text" name="titulo" class="form-control" value="<?php echo $row['title'] ?>"></td>
<td><input type="text" name="texto" class="form-control" value="<?php echo $row['texto'] ?>"></td>
<td><input type="text" name="local_os" class="form-control" value="<?php echo $row['local_os'] ?>"></td>
<td><select name="prioridade" class="form-control">
          <option value="Baixa">Baixa</option>
          <option value="Média">Media</option>
          <option value="Alta">Alta</option>
         
        </select>
</td>
  </tbody>

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data</th>
      <th scope="col">Hora</th>
      <th scope="col">Solução</th>
      <th scope="col">Status</th>
    
    </tr>
  </thead>
  <tbody>

<th scope="row"></th>

<td><input type="date" name="data1" class="form-control" value="<?php echo $row['data1'] ?>"></td>
<td><input type="time" name="time" class="form-control" value="<?php echo $row['hora'] ?>"></td>
<td><input type="text" name="solucao" class="form-control" value="<?php echo $row['solucao_os'] ?>"></td>
<td><select name="status" class="form-control">
          <option value="2">OS aberta</option>
          <option value="3">Avaliado</option>
          <option value="4">Pendente</option>
         <option value="5">Pendente por sup</option>
        <option value="6"> Solucionado</option>
      <option value="1"> Arquivar</option>
        </select>
</td>


  </tbody>
</table>
<input type="submit" name="submit" value="Salvar Mudanças" class="btn btn-primary">
</form>
<?php

if($_POST){
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$local = $_POST['local_os'];
$data1 = $_POST['data1'];
$time = $_POST['time'];
$solucao = $_POST['solucao'];
$prioridade = $_POST['prioridade'];
$status = $_POST['status'];
$x->set_formulario($data1,$time,$texto,$titulo,$row['ip_os'],$prioridade,$local,$status,$solucao);
$x->update_formulario();
header("Location: ../listar/listar_formularios");
}
?>  
  </tbody>
</table>
