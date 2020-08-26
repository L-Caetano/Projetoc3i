<?php
class computadores{
protected $id_comp,$config,$historico,$modelo,$sessao,$nr_serie,$numero,$nome;
function __construct() {
        $this->conn = new conect();
    }
function set_novo_id($id_comp){
    	$this->id_comp = $id_comp;
    }
    function get_id(){
      return $this->id_comp;
    }
function set_novo_computador($sessao,$config,$modelo,$nr_serie,$numero,$nome){
         $this->sessao = $this->conn->real_escape_string($sessao);
         $this->config = $this->conn->real_escape_string($config);
         $this->modelo = $this->conn->real_escape_string($modelo);
         $this->nr_serie = $this->conn->real_escape_string($nr_serie);
         $this->numero = $this->conn->real_escape_string($numero);
         $this->nome = $this->conn->real_escape_string($nome);
          
     }
function enviar_comput(){
	if($this->conn->action('INSERT INTO computadores(configu,modelo,sessao,nr_serie,numero,nome) VALUES ("'.$this->config.'","'.$this->modelo.'","'.$this->sessao.'","'.$this->nr_serie.'","'.$this->numero.'","'.$this->nome.'")')){
        sucesso();
       }
       else{
           erro(); 
       }
    }
 function todos_computadores($page){
    if($x = $this->conn->action('SELECT sessao,id_comp,modelo FROM `computadores` WHERE 1 ')){
      /*while($row=$x->fetch_array()){
        echo $row['name'];
      }*/
      $results_per_page = 10;
      $numero_rows = mysqli_num_rows($x);
      
  $number_of_pages = ceil($numero_rows/$results_per_page);
  $this_page_first_result = ($page-1)*$results_per_page;
$x = $this->conn->action('SELECT sessao,id_comp,modelo FROM `computadores` WHERE 1 LIMIT '. $this_page_first_result . ',' .  $results_per_page);
 if($page != 1){
 $page = $page -1;
}else{
  $page = 1;
 } 
echo '<nav aria-label="Page navigation example"><ul class="pagination">
 <li class="page-item"><a class="page-link" href="listar_computadores.php?page=' . 
$page
 . '"><</a></li>';
   for ($page=1;$page<=$number_of_pages;$page++) {
  echo '
  <li class="page-item"><a href="listar_computadores.php?page=' . $page . '">' . $page . '</a></li> ';
}
 if (!isset($_GET['page'])) {
       $page = 1;
       } else {
       $page = $_GET['page'] + 1;
       }
echo '<li class="page-item"><a class="page-link" href="listar_computadores.php?page='.
$page.'">></a></li>';
echo ' </ul>
</nav>';

            return $x;


    }
  }
  function get_computador(){
   if($x = $this->conn->action('SELECT * FROM `computadores` WHERE `id_comp` = '.$this->id_comp.' ')){
            return $x;
   }else{
     erro(); 
   }
  }
  function update_comput($id){
  if($this->conn->action('UPDATE computadores SET configu ="'.$this->config.'", modelo ="'.$this->modelo.'",sessao ="'.$this->sessao.'",nr_serie ="'.$this->nr_serie.'",numero="'.$this->numero.'",nome="'.$this->nome.'" WHERE id_comp ='.$id)){
        sucesso();
       }
       else{
          erro();
       }
    }
    function deletar(){
      if($this->conn->action("DELETE FROM `computadores` WHERE `computadores`.`id_comp` =".$this->id_comp)){
    
    }else{
      erro();
    }
}
    function search_computadores($search){
      if($x = $this->conn->action('SELECT * FROM `computadores` WHERE `modelo` LIKE "%'.$search.'%" OR `sessao` LIKE "%'.$search.'%" OR `nr_serie` LIKE "%'.$search.'%" OR `configu`  LIKE "%'.$search.'%" OR `numero` LIKE "%'.$search.'%" OR `nome` LIKE "%'.$search.'%" ')){
        if(mysqli_num_rows($x) > 0){
               return $x;
        }else{
          
          return $x = false;
        }
      }
    }
}

?>