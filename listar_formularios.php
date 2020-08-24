 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php 
include_once 'classes/formulario.class.php';
include_once 'classes/header.php';

$x = new formulario();

 ?>
 
 <div class="col-sm-3 col-sm-offset-4">
   <form action="pesquisa_formulario.php" method="POST">
      <input type="text" name="search" class="form-control">
 </div>
 <button type="submit" name="submit-search" class="btn btn-primary">Pesquisar</button>
   </form>
 
 <div class="col-sm-8 col-sm-offset-2">
  <h1>Ordens de serviço</h1>
  <?php 
$z = $x->todos_formularios();
$y=0;
  ?>
 <table class="table">
  <thead>
    <tr>
        <th scope="col"></th>
      <th scope="col">Senha</th>
      <th scope="col">Titulo</th>
      <th scope="col">Data/Hora</th>
      <th scope="col">Por</th>
      <th scope="col"> <a  href="novo_formulario.php" class="btn btn-primary" > <i class="fa fa-plus-square"></i></a></th>
    </tr>
  </thead>
  <tbody>
   
    
      <?php
      while($row=$z->fetch_array()){
        $x->set_userid($row['iduser']);
        $user = $x->get_user();
	echo '<tr>
  <th scope="row"></th>
      <th >#'.$row['id_formulario'].'</th>
      <td><b>'.ucfirst($row['title']).'</b></td>
      <td>'.date('d/m/Y',strtotime($row['data1'])).' - '.date('H:i', strtotime($row['hora'])).'</td>
       <td>'.$user.'</td>
      ';
	$id[$y] = $row['id_formulario'];
	echo ' <div class="w3-container">
 <td>
  <button onclick="document.getElementById(\''.$id[$y].'\').style.display=\'block\'" class="btn btn-primary">Detalhes...</button>
</td>
  <div id="'.$id[$y].'" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById(\''.$id[$y].'\').style.display=\'none\'" class="w3-button w3-display-topright">&times;</span>
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
<a  href="update_formulario.php?id_form='.$id[$y].'" class="btn btn-primary " ><i class="fa fa-edit"></i></a>';
echo '<a  href="scripts/deletar_formulario.php?id_form='.$id[$y].'" class="btn btn-danger" onclick="return confirm(\'Tem certeza que deseja deletar este ordem?\');"><i class="fa fa-trash"></i></a></div><br>';
      
       echo' <hr><p>Por: '.$user.' em '.date('d/m/Y',strtotime($row['data1'])).' - '.date('H:i', strtotime($row['hora'])).' - Ip: '.$row['ip_os'].'</p>
      </div>
    </div>
  </div>
</div>';
	$y = $y+1;
}
?>

    
  </tbody>
</table>
</div>