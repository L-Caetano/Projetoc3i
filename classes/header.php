
<?php
if(!isset($_SESSION['login'])){
session_start();
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php
include_once '../css/custom.css';
?>
<nav class="navbar navbar-default ">
  <div class="container-fluid ">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
        <li><img src="../css/favicon.ICO"></li>
        <?php
        echo '

        <li><a href="../novos/novo_usuario.php">Registrar Novo Usuario</a></li>
        ';
        if((isset($_SESSION['login']))and($_SESSION['login'] == true)){
echo '<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Listar
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../listar/listar_computadores.php?page=1">Materiais</a></li>
          <li><a href="../listar/listar_formularios.php">Ordens de serviço</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Novo(a)
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../novos/novo_computador.php">Materiais</a></li>
          <li><a href="../novos/novo_formulario.php">Ordem de serviço</a></li>
        </ul>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="delogarteste.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
      </ul>
    </div>
  </div>
</nav>';
}else{
        echo 	
    
      '
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>';
}
include_once '../css/alerts.php';
?>

