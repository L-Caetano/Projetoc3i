<?php
include_once '../scripseguranca.php';
$z = new seguranca();
$z->seg_nivel();
$z->set_session_niveis();
$z->set_niveis_aceitos(1);
$z->testar();

include_once '../classes/header.php';
include_once '../classes/connection.class.php';
include_once '../classes/computadores.class.php';
?>

<div class="col-sm-3 col-sm-offset-4">

   <form action="../pesquisa/pesquisa_material.php" method="POST">
      <input type="text" name="search" class="form-control">
       
 </div>
 

 <button type="submit" name="submit-search" class="btn btn-primary">Pesquisar</button>
   </form>


<div class="col-sm-8 col-sm-offset-2">
<h3>Resultado da pesquisa:</h3>
</div>
<?php
$y = new conect();
if(isset($_POST['submit-search'])){
 $x = new computadores();
 $w = $y->real_escape_string($_POST['search']);
 $z = $x->search_computadores($w);

}
?>

 
<?php
if($z == false){
echo '<div class="col-sm-8 col-sm-offset-2">
          <h4>Não é possivel encontrar computadores com essas características</h4>';
}else{
?>
 <div class="col-sm-8 col-sm-offset-2">
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Seção</th>
      <th scope="col"></th>
    
    </tr>
  </thead>
  <tbody>
   
    
      <?php
      $m = 0;

      while($row=$z->fetch_array()){
	echo '<tr>
      <th scope="row">'.$m.'</th>
      <td>'.$row['modelo'].'</td>
      <td>'.$row['sessao'].'</td>

      ';
	$id[$m] = $row['id_comp'];
	echo ' <td><a  href="../perfil/perfil_computador.php?id_comps='.$id[$m].'" class="btn btn-primary" >Mais detalhes...</a></td>  </tr>';
	$m = $m+1;
}}
?>