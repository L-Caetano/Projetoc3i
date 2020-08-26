<?php
require_once 'computadores.class.php';
class historico extends computadores{
protected $id_historia,$mudanca,$data_de;
    function get_id_his(){
        return $this->id_historia;
    }
    function set_id_his($id){
        $this->id_historia = $this->conn->real_escape_string($id);
    }
    function set_new_historico($mudanca,$data_de){
        $this->data_de = $this->conn->real_escape_string($data_de);
        $this->mudanca = $this->conn->real_escape_string($mudanca);
    }
    function get_historico(){
    	if($x = $this->conn->action('SELECT * FROM `historico` WHERE `id_comp` = '.$this->id_comp.' ORDER BY `historico`.`data_de` DESC')){
            return $x;
   }else{
     erro('HG19');
   }
    }
      function deletar_todo_historico(){
      if($this->conn->action("DELETE FROM `historico` WHERE `id_comp` =".$this->id_comp)){
    
    }else{
      erro();
    }
}
function deletar_historico(){
      if($this->conn->action("DELETE FROM `historico` WHERE `id_historia` =".$this->id_historia)){
    
    }else{
      erro('HD33');
    }
}
function new_historico(){
   if($this->conn->action('INSERT INTO `historico`(`id_comp`, `mudanca`, `data_de`) VALUES ('.$this->id_comp.' ,"'.$this->mudanca.'" , "'.$this->data_de.'")') ) {

   }else{
    erro('HN40');
   }
}
}
?>