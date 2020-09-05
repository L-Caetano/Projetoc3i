<?php
if(!isset($_SESSION['login'])){
session_start();
}
if($_SESSION['login'] == FALSE){
header("Location: user/login.php");  
}
if($_SESSION['login'] == TRUE){
header("Location: listar/listar_formularios.php?page=1");  
}
?>