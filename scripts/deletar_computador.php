<?php
include_once '../scripseguranca.php';
$z = new seguranca();
$z->seg_nivel();
$z->set_session_niveis();
$z->set_niveis_aceitos(1);
$z->testar();
$id = $_GET['id_comps'];
include_once '../classes/computadores.class.php';
include_once '../classes/connection.class.php';
include_once '../classes/historico.class.php';

$x = new computadores();
$x->set_novo_id($id);
$x->deletar();
 
$y = new historico();
$y->set_novo_id($id);
$y->deletar_todo_historico();

header("Location: ../listar/listar_computadores.php?page=1");   