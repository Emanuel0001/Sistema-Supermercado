<?php
 
$valor= @$_POST['valor'];

if(isset($valor)){
	include ("mysql.class.php");
	$id= $_POST['id'];
 
	$obj_mysql = new Mysql();
	$result =$obj_mysql->delete_produto($id);
 	 if($result=="Deletado"){header("location: telaprincipal.php");?>
   

		  <div class="alert alert-success" role="alert">Deletado com sucesso <a href="meusclientes.php">Clique aqui para voltar</a></div>
	  <?php
	 } else { ?>
	           <div class="alert alert-danger" role="alert"><?php echo $result ?></div>

 <?php }
  $valor=0;
  unset($valor);
 }
?>
        
         

       