<?php
function sucesso(){
	echo '
 <div class="col-sm-8 col-sm-offset-2">
	<div class="alert alert-success" role="alert">
  Sua requisição foi um sucesso!
</div></div>';
}
function erro($erro){
	echo '<div class="alert alert-danger" role="alert">
  Falha na sua requisição! Erro:'.$erro.'
</div>';
}