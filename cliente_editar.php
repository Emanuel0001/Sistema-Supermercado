<html>
<head><link rel="stylesheet" type="text/css" href="css/telaprincipal.css"></head>
<body><?php include ("sis_cabecalho.php"); ?>
<center>

       <?php
      include ("mysql.class.php");

    $id=@$_GET['id'];
    if($id){
     $obj_busca = new Mysql();
     $resultado= $obj_busca->fetch_id5($id);
     while($row= $resultado->fetch_assoc()){
          $nome=$row['nomecliente'];
          $cpf=$row['cpfcliente'];

     }
}


$valor= @$_POST['valor'];

if(isset($valor)){
  $id= $_POST['id'];
  $nomecliente= $_POST['nomecliente'];
  $cpfcliente= $_POST['cpfcliente'];
  $obj_mysql = new Mysql();
  $result =$obj_mysql->update_cliente($id,$nomecliente,$cpfcliente);
   if($result=="Atualizado"){header("location: meusclientes.php");?>
      <div class="alert alert-success" role="alert">Registrado Atualizado com sucesso</div>
    <?php
   } else { ?>
             <div class="alert alert-danger" role="alert"><?php echo $result ?></div>

 <?php }
  $valor=0;
  unset($valor);
 }
?>

<center>
     	    <form action="cliente_editar.php" method="post" >
       <table border="2"  style="width:500px">     
            <div class="form-group">
              <label for="exampleInputEmail1">Nome </label>
              <input style="width:400px" type="text" class="form-control" name="nomecliente" id="exampleInputEmail1" value="<?php echo $nome; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">CPF</label>
              <input style="width:400px" type="text" class="form-control" name="cpfcliente" id="exampleInputPassword1" value="<?php echo $cpf; ?>">
            </div>
             <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
             <input type="hidden" name="valor" value="1">
             
            <button type="submit" class="btn btn-default">Alterar</button> <a href="meusclientes.php" class="btn btn-default">Voltar</a>
        </table>
          </form></center>
       </center>
</body></html>