<?php
include_once '../scripseguranca.php';
$z = new seguranca();
$z->seg_nivel();
$z->set_session_niveis();
$z->set_niveis_aceitos(1);
$z->set_niveis_aceitos(2);
$z->testar();

$id = $_GET['id_form'];
include_once '../classes/connection.class.php';
include_once '../classes/formulario.class.php';

$x = new formulario();
$x->set_id_formulario($id);
$x->deletar_formulario();
 
header("Location: ../listar/listar_formularios.php?page=1");   