<?php
include_once 'classes/scripseguranca.php';
$w = new seguranca();
$w->seg_nivel();
$id_comp=$_GET['id_comp'];
$id = $_GET['id_historic'];
include_once 'classes/computadores.class.php';
include_once 'classes/connection.class.php';
include_once 'classes/historico.class.php';
 
$y = new historico();
$y->set_id_his($id);
$y->deletar_historico();

header("Location: perfil_computador.php?id_comps=".$id_comp);   