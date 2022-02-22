<html>
<head><link rel="stylesheet" type="text/css" href="telaprincipal.css"></head>
<body><?php include ("sis_cabecalho.php"); ?>
<center>

       <?php
      include ("mysql.class.php");

    $id=@$_GET['id'];
    if($id){
     $obj_busca = new Mysql();
     $resultado= $obj_busca->fetch_id($id);
     while($row= $resultado->fetch_assoc()){
          $senha=$row['senha'];
          $email=$row['email'];
     }
}


$valor= @$_POST['valor'];

if(isset($valor)){
  $id= $_POST['id'];
  $email= $_POST['email'];
  $senha= $_POST['senha'];
  $obj_mysql = new Mysql();
  $result =$obj_mysql->update($id,$email,$senha);
   if($result=="Atualizado"){?>
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
  <div id="central">
     	    <form action="usuario_editar.php" method="post" >
          
            <div class="form-group">
              <label for="exampleInputEmail1">Email </label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Senha</label>
              <input type="password" class="form-control" name="senha" id="exampleInputPassword1" value="<?php echo $senha; ?>">
            </div>
             <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
             <input type="hidden" name="valor" value="1">
             
            <button type="submit" class="btn btn-default">Alterar</button> <a href="usuario.php" class="btn btn-default">Voltar</a>
          </form></center>
       </center></div>
</body></html>