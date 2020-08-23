<?php 
include_once 'classes/connection.class.php';
include_once 'classes/computadores.class.php';
include_once 'classes/header.php';

$x = new computadores();

 ?>


 <div class="col-sm-3 col-sm-offset-4">
   <form action="pesquisa_material.php" method="POST">
      <input type="text" name="search" class="form-control">
 </div>
 <button type="submit" name="submit-search" class="btn btn-primary">Pesquisar</button>
  
   </form>
 
 <div class="col-sm-8 col-sm-offset-2">
 <h1>Materiais</h1>
 <?php
$z = $x->todos_computadores();
$y=0;
 ?>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Seção</th>
      <th scope="col"><a  href="novo_computador.php" class="btn btn-primary" ><i class="fa fa-plus-square"></i></a></th>
    
    </tr>
  </thead>
  <tbody>
   
    
      <?php
      while($row=$z->fetch_array()){
	echo '<tr>
      <th scope="row"></th>
      <td><b>'.ucfirst($row['modelo']).'</b></td>
      <td>'.$row['sessao'].'</td>

      ';
	$id[$y] = $row['id_comp'];
	echo ' <td><a  href="perfil_computador.php?id_comps='.$id[$y].'" class="btn btn-primary" >Detalhes...</a></td>  </tr>';
	$y = $y+1;
}
?>

    
  </tbody>
</table>
