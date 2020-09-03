<?php
include_once '../scripseguranca.php';
$z = new seguranca();
$z->seg_nivel();
$z->set_session_niveis();
$z->set_niveis_aceitos(1);
$z->testar();

include_once '../classes/connection.class.php';

include_once '../classes/formulario.class.php';
       $page = $_POST['actualpage'];

$x = new formulario();
$z = $x->todos_formularios($page);
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
      <th scope="col"> <a  href="../novos/novo_formulario.php" class="btn btn-primary" > <i class="fa fa-plus-square"></i></a></th>
    </tr>
  </thead>
  <tbody>
   
    
      <?php
      while($row=$z->fetch_array()){
        $x->set_user_id($row['iduser']);
        $user = $x->get_user();
	echo '<tr>
  <th scope="row"></th>
      <th >#'.$row['id_formulario'].'</th>
      <td><b>'.ucfirst($row['title']).'</b></td>
      <td>'.date('d/m/Y',strtotime($row['data1'])).' - '.date('H:i', strtotime($row['hora'])).'</td>
       <td><a href="../perfil/perfil_user.php?iduser='.$row['iduser'].'" >'.$user.'</a></td>
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
<a  href="../update/update_formulario.php?id_form='.$id[$y].'" class="btn btn-primary " ><i class="fa fa-edit"></i></a>';
echo '<a  href="../scripts/deletar_formulario.php?id_form='.$id[$y].'" class="btn btn-danger" onclick="return confirm(\'Tem certeza que deseja deletar este ordem?\');"><i class="fa fa-trash"></i></a></div><br>';
      
       echo' <a href="../perfil/perfil_user.php?iduser='.$row['iduser'].'" >
       <hr><p>Por: '.$user.'</a> em '.date('d/m/Y',strtotime($row['data1'])).' - '.date('H:i', strtotime($row['hora'])).' - Ip: '.$row['ip_os'].'</p>
      </div>
    </div>
  </div>
</div>';
	$y = $y+1;
}
?>

    
  </tbody>
</table>