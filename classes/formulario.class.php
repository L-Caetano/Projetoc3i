<?php 
include_once 'user.class.php';
class formulario extends user{
protected $data1,$horario,$id_formulario,$texto,$title,$ip,$prioridade,$local,$status,$solucao_os,$tecnico;
function set_id_formulario($id){
       $this->id_formulario = $id;
}

    function deletar_formulario(){
      if($this->conn->action("DELETE FROM `formulario` WHERE id_formulario =".$this->id_formulario)){
    
    }else{
     erro('OD13');
    }
}
function set_formulario($data1,$horario,$texto,$title,$ip,$prioridade,$local,$status,$solucao_os){
  $this->solucao_os = $this->conn->real_escape_string($solucao_os);
        $this->data1 = $this->conn->real_escape_string($data1);
        $this->horario = $this->conn->real_escape_string($horario);
        $this->texto = $this->conn->real_escape_string($texto);
        $this->userid = $_SESSION['iduser'];
        $this->title = $this->conn->real_escape_string($title);
        $this->ip = $ip;
        $this->prioridade = $prioridade;
        $this->local = $this->conn->real_escape_string($local);
        $this->status = $status;
}
function up_formulario(){
 if($this->conn->action('INSERT INTO `formulario`( `iduser`, `data1`, `hora`, `texto`,`title`,`local_os`, `ip_os`, `prioridade_os`, `status_os`) VALUES ('.$this->userid.',"'.$this->data1.'","'.$this->horario.'","'.$this->texto.'","'.$this->title.'","'.$this->local.'","'.$this->ip.'","'.$this->prioridade.'",'.$this->status.')')){
sucesso();
 }else{
 	erro('OU32');
 }
}
 function meus_formularios(){
    if($x = $this->conn->action('SELECT * FROM `formulario` WHERE `iduser`='.$this->userid)){


            return $x;
    }
  }
  function get_formulario(){
    if($x = $this->conn->action('SELECT * FROM `formulario` WHERE `id_formulario`='.$this->id_formulario)){


            return $x;
    }
  }

 function todos_formularios($page){
    if($x = $this->conn->action('SELECT * FROM `formulario` WHERE 1 ORDER BY `data1` DESC, `hora` DESC')){
 $results_per_page = 10;
      $numero_rows = mysqli_num_rows($x);
      
  $number_of_pages = ceil($numero_rows/$results_per_page);
  $this_page_first_result = ($page-1)*$results_per_page;
$x = $this->conn->action('SELECT * FROM `formulario` WHERE 1 ORDER BY `data1` DESC, `hora` DESC LIMIT '. $this_page_first_result . ',' .  $results_per_page);
if($page != 1){
 $page = $page -1;
}else{
  $page = 1;
 } 
echo '<nav aria-label="Page navigation example"><ul class="pagination">
 <li class="page-item"><a class="page-link" href="listar_formularios.php?page=' . 
$page
 . '"><</a></li>';
   for ($page=1;$page<=$number_of_pages;$page++) {
  echo '
  <li class="page-item"><a href="listar_formularios.php?page=' . $page . '">' . $page . '</a></li> ';
}
 if (!isset($_GET['page'])) {
       $page = 1;
       } else {
       $page = $_GET['page'] + 1;
       }
echo '<li class="page-item"><a class="page-link" href="listar_formularios.php?page='.
$page.'">></a></li>';
echo ' </ul>
</nav>';

            return $x;
    }
  }
function update_formulario(){
  if($x= $this->conn->action('UPDATE `formulario` SET `data1`="'.$this->data1.'",`hora`="'.$this->horario.'",`texto`="'.$this->texto.'",`title`="'.$this->title.'",`local_os`="'.$this->local.'",`ip_os`="'.$this->ip.'",`solucao_os`="'.$this->solucao_os.'",`prioridade_os`="'.$this->prioridade.'",`tecnico_os`="'.$this->tecnico.'",`status_os`="'.$this->status.'" WHERE id_formulario='.$this->id_formulario)){
    sucesso();
  }else{
    erro('OU93');
  }
}
function search_formularios($search){
      if($x = $this->conn->action('SELECT * FROM `formulario` WHERE `data1` LIKE "%'.$search.'%" OR `hora` LIKE "%'.$search.'%" OR `texto` LIKE "%'.$search.'%" OR `title`  LIKE "%'.$search.'%" OR `local_os` LIKE "%'.$search.'%" OR `ip_os` LIKE "%'.$search.'%" OR `solucao_os` LIKE "%'.$search.'%" OR `prioridade_os` LIKE "%'.$search.'%" OR `tecnico_os` LIKE "%'.$search.'%" OR `status_os` LIKE "%'.$search.'%"')){
        if(mysqli_num_rows($x) > 0){
               return $x;
        }else{
          
          return $x = false;
        }
      }
    }
  /*
  function fodase(){
  	if($x = $this->conn->action('SELECT * FROM `ref_ldap` WHERE 1')){
  		echo 'kk<br>';
  	while($row = $x->fetch_array()){
  	$this->conn->action("INSERT INTO `usuario` (nome) VALUES ('".$row['login_ldap']."')");
  	echo $row['login_ldap'].'';
  }
  }
  }*/
}