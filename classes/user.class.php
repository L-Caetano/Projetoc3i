<?php
include_once 'connection.class.php';
class user{
     protected $email, $userid,$id_nivel;
     private $password;
	function __construct() {
        $this->conn = new conect();
       }
       function set_userid($id){
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
        echo 'Falha ao registrar';}
     }}}
//Função usada apos enviar formulario
     function login(){
      /*----------------------AVISO----------------------- 
     O LOGIN PODE SER FEITO DE DIVERSAS FORMAS A PARTE REALMENTE IMPORTANTE É O LOOP QUE SETA AS $_SESSION['nivel'.$num] E $_SESSION['num'] = $num;

      */
     	if($result = $this->conn->action('SELECT * FROM `usuario` WHERE `email`= "'.$this->email.'" and `senha`="'.$this->password.'"')){

     		if(mysqli_num_rows($result) > 0){
     			echo 'Logado';
     			 $_SESSION['login']=true;
           

           if($x = $this->conn->action('SELECT iduser FROM `usuario` WHERE `email`= "'.$this->email.'"')){
           $row=$x->fetch_array();
           $_SESSION['iduser']=$row['iduser'];
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
                return TRUE;
            }
          }else{
            echo 'error';
          }
    }
     		}else{
                echo 'Erro 1';
            }
     }else{
     	echo "Falha ao conectar-se ao servidor";
     }
 }
  function logged(){
    if( $_SESSION['login'] = true){
         header("Location: ../index.php");
    }
  }
  function get_user(){
if($x = $this->conn->action('SELECT nome FROM `usuario` WHERE `iduser`= '.$this->userid)){
    $row = $x->fetch_array();
    $x = $row['nome'];
    return $x;
  }
}
}