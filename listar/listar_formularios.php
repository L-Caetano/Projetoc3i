 <!DOCTYPE html>
<html>
<head>
  <?php 
include_once '../classes/header.php';
 ?>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
   $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
         return results[1] || 0;
}
    $(document).ready(function(){
    var page =  $.urlParam('page');
     $("#div_refresh").load("reload_listar_ordem.php",{
       actualpage: page
     });
        $("#button1").click(function() {
         
            $("#div_refresh").load("reload_listar_ordem.php", {
              actualpage: page
            });

        });
    });
 
</script>
 </head>
<body>
 <div class="col-sm-3 col-sm-offset-4">
   <form action="../pesquisa/pesquisa_formulario.php" method="POST">
      <input type="text" name="search" class="form-control">
 </div>
 <button type="submit" name="submit-search" class="btn btn-primary">Pesquisar</button>
   </form>
 
 <div class="col-sm-8 col-sm-offset-2">
  <h1>Ordens de serviço <button id="button1" class="btn btn-primary"><i class="glyphicon glyphicon-repeat"></i></button></h1>
<div id="div_refresh">
  
</div>
</div>
</body>
</html>