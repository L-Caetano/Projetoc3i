<?php
include_once '../scripseguranca.php';
$z = new seguranca();
$z->seg_nivel();
$z->set_session_niveis();
$z->set_niveis_aceitos(1);
$z->testar();

$id_comp=$_GET['id_comp'];
$id = $_GET['id_historic'];
include_once '../classes/computadores.class.php';
include_once '../classes/connection.class.php';
include_once '../classes/historico.class.php';
 
$y = new historico();
$y->set_id_his($id);
$y->deletar_historico();

header("Location: ../perfil/perfil_computador.php?id_comps=".$id_comp);   