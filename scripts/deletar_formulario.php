<?php
include_once '../classes/scripseguranca.php';
$w = new seguranca();
$w->seg_nivel();
$id = $_GET['id_form'];
include_once '../classes/connection.class.php';
include_once '../classes/formulario.class.php';

$x = new formulario();
$x->set_id_formulario($id);
$x->deletar_formulario();
 
header("Location: ../listar/listar_formularios.php?page=1");   