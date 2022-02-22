<head>
</head>
<?php include ("sis_cabecalho.php"); ?>
<?php

@$valor= $_POST['valor'];

if(isset($valor)){
	include ("mysql.class.php");
	$email= $_POST['email'];
	$senha= $_POST['senha'];
	$obj_mysql = new Mysql();
  
	$result =$obj_mysql->insert($email,$senha);
 	 if($result=="Registrado"){?>
		  <center><h1><div class="alert alert-success" role="alert">Registrado com sucesso</div><h1></center>
	  <?php
	 } else { ?>
	           <div class="alert alert-danger" role="alert"><?php echo $result ?></div>

 <?php }
  $valor=0;
  unset($valor);
 }
?>
        
                     
         
<center>
       <TD>
          <form action="usuario_adicionar.php" method="post" >
          
            Email:<input style="width:500px"  type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email"><br>
            Senha:<input style="width:500px" type="password" class="form-control" name="senha" id="exampleInputPassword1" placeholder="Senha"><br>
             <input type="hidden" name="valor" value="1">
             <button type="submit" class="btn btn-primary">Adicionar</button> 
          </form>
       
       
     

    
          
        
	</td>
  
  </center>
 
  
  
