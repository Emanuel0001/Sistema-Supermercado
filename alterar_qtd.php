<?php 
$valor= @$_POST['valor'];
if(isset($valor)){

      include ("mysql.class.php");

    $quantidadeproduto=$_POST['quantidadeproduto']; 
    $id= $_POST['id'];
  
  $obj_mysql = new Mysql();
  $result =$obj_mysql->update_qtd($id,$quantidadeproduto);
   if($result){
       header("location: telaprincipal.php");
   }
}?>



<?php 

$valor1= @$_POST['valor1'];
if(isset($valor1)){
	
	include ("mysql.class.php");
	$precoproduto=$_POST['precoproduto']; 
    $id= $_POST['id'];
  
  	$obj_mysql = new Mysql();
  	$result =$obj_mysql->update_preco($id,$precoproduto);
   	if($result){
   	header("location: estoque.php");
   }
}