<?php

class seguranca{
protected $num = 0,$todos_session_niveis,$niveis_aceitos;

function __construct(){
	if(!isset($_SESSION['login'])){
session_start();
}
}
function seg_nivel(){
	
if(!isset($_SESSION['login'])or($_SESSION['login'] == false)){
  
  header('HTTP/1.0 404 Not Found');
  die('Acesso negado!');

  }
 }
 //Cria um loop que transforma todos os $_SESSIONS de cargo em um Array para ser usado nessa classe de segurança
 function set_session_niveis(){
    $num = 0;
    for($z = 1;;$z++){
    //Aqui é usado por exemplo a $_SESSION['num'] para saber  quantas repetições são necessarias para setar todos os cargos existentes   
        if($z > $_SESSION['num']){
           break;
                }
        $num = $num + 1;
       $this->todos_session_niveis[$num] = $_SESSION['nivel'.$num];
       
     }
       }
 function set_niveis_aceitos($nivel){
          //nessa função o uso da variavel $this->num e não apenas $num é essencial visto que é necessario a contagem permanecer armazenada
           $this->num = $this->num + 1;
       $this->niveis_aceitos[$this->num] = $nivel;
 }
function conferir_niveis(){
 
  if(is_array($this->niveis_aceitos)){
  $y = count($this->niveis_aceitos);
}else{
  $y = 1;
}
  if(is_array($this->todos_session_niveis)){
  $w = count($this->todos_session_niveis);
}else{
  $w = 1;
}
  for($x = 1; ;$x++){
    for($z = 1; ;$z++){
         if($x > $w){
           die('Acesso negado!');
                }
         if($this->todos_session_niveis[$x] == $this->niveis_aceitos[$z]){
          break 2;
         }
         if($z >= $y){
          break;
         }
         
           }
       }

   }
 }
