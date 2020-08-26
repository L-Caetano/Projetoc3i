
<?php

include_once '../classes/connection.class.php';

include_once '../classes/computadores.class.php';

       $page = $_POST['actualpage'];
       
$x = new computadores();

$z = $x->todos_computadores($page);
$y=0;
 ?>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Seção</th>
      <th scope="col"><a  href="../novos/novo_computador.php" class="btn btn-primary" ><i class="fa fa-plus-square"></i></a></th>
    
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
	echo ' <td><a  href="../perfil/perfil_computador.php?id_comps='.$id[$y].'" class="btn btn-primary" >Detalhes...</a></td>  </tr>';
	$y = $y+1;
}
?>

  </tbody>
</table>
