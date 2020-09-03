<?php
include_once 'connection.class.php';
class user{
     protected $email, $userid,$id_nivel;
     private $password;
	function __construct() {
        $this->conn = new conect();
       }
       function set_user_id($id){
        $this->userid = $id; 
       }
     function set_info($email,$password){
          $this->email = strtolower($this->conn->real_escape_string($email));
           $this->password = md5(strtolower($password));
     }
     
     function upload_new_user(){
     	  if($result = $this->conn->action('SELECT * FROM `usuario` WHERE `email`= "'.$this->email.'"')){
            if(mysqli_num_rows($result) > 0){
                echo 'E-mail já existente'; 

            }else{
            if($this->conn->action('INSERT INTO usuario(email,senha) VALUES ("'.$this->email.'","'.$this->password.'")')){
                  echo 'Usuário Registrado';

       }else{
        erro('UU27');
      }
     }
   }
 }
//Função usada apos enviar formulario
     function login(){
      /*----------------------AVISO----------------------- 
     O LOGIN PODE SER FEITO DE DIVERSAS FORMAS A PARTE REALMENTE IMPORTANTE É O LOOP QUE SETA AS $_SESSION['nivel'.$num] E $_SESSION['num'] = $num;

      */
     	if($result = $this->conn->action('SELECT * FROM `usuario` WHERE `email`= "'.$this->email.'" and `senha`="'.$this->password.'"')){

     		if(mysqli_num_rows($result) > 0){
     			 $_SESSION['login']=true;
           

           if($x = $this->conn->action('SELECT iduser,senha FROM `usuario` WHERE `email`= "'.$this->email.'"')){
           $row=$x->fetch_array();
           $novaSenha=FALSE;
           $_SESSION['iduser']=$row['iduser'];
           if($row['senha']== '202cb962ac59075b964b07152d234b70'){
                  $novaSenha=TRUE;
                  echo'<script> alert("grito"); </script>';
                       } 

              //Busca todos os cargos que o usuario X tem \/
          if($y = $this->conn->action('SELECT id_nivel FROM nivelseg_usuario WHERE iduser ='.$row['iduser'])){
                $num = 0;
                //$row Recebe os dados de usuario, via while loop é possivel escrever todos os cargos diferentes que o usuário possue
                while($row=$y->fetch_array()){
                $num = $num + 1;    
                //nesse loop 'nivel' concatenasse com $num criando sempre uma $_SESSION nova que tem nivel + número único ['nivel'.$num] sendo igual ao nivel de acesso recebido do banco, ou seja como exemplo pratico: $_SESSION['nivel1'] = 'Tenente', $_SESSION['nivel2'] = 'Sargento'
                $_SESSION['nivel'.$num] = $row['id_nivel'];
                //$_SESSION['num'] sendo igual ao número de repetições do loop while serve para manter registrados no sistema quantos cargos o indivíduo possue sem ser necessário abrir o banco de dados em futuras funções para checar
                $_SESSION['num'] = $num;
                if($novaSenha==TRUE){
               header("Location: ../user/novasenha.php?");
              }
              else if($novaSenha==FALSE){
                return TRUE;
              }
            }
          }else{
            erro('UL1-60');
          }
    }
     		}else{
               erro('UL2-64');
            }
     }else{
     	erro('UL3-67');
     }
 }
  function logged(){
    if( $_SESSION['login'] = true){
         header("Location: ../index.php");
    }
  }
  function get_user(){
if($x = $this->conn->action('SELECT * FROM `usuario` WHERE `iduser`= '.$this->userid)){
    $x=$x->fetch_array();
    return $x['nome'];
  }
}
}