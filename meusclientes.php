<html>
<head>
  <title></title>
</head>
<body>
<?php include ("sis_cabecalho.php"); ?>


      
         
          </tbody>
       </table>

<style type="text/css">
#cadastrocliente{
  padding: 10px;
  width: 150px;
font-size: ;
color: #FFF;
font-weight: 600;
border: solid 1px #FFF;
background-color: blue;
position: absolute;
left: 25%;
top: 1%;
}
#buscarcliente{
  padding: 10px;
  width: 150px;
font-size: ;
color: #FFF;
font-weight: 600;
border: solid 1px #FFF;
background-color: blue;
position: absolute;
left: 37%;
top: 1%;
}
</style>
              <form method="post" action="cadastrocliente.php">
              <input type="submit" value="Cadastra Cliente" id="cadastrocliente">    
              </form>


              <form method="post" action="debitoconta.php">
              <input type="submit" value="busca Cliente" id="buscarcliente">    
              </form>

              

     </body>
</html>
	



























































<!-- 

<table class="table table-striped" border="2"  style="width:600px" ID="alter"> 
        <thead>
             <tr>
                 <td>id</td> <td>Nome</td> <td>CPF</td> <td>Ações</td>  
             </tr> 
        </thead>
         <tbody> 
           <?php
                     include ("mysql.class.php");
                     $obj_mysql = new Mysql();
                     $resultado=$obj_mysql->fetch_all_cliente("cliente");
                     while($row = $resultado->fetch_assoc()) {?>
                        
                                <tr> 
                    <td scope="row"><?php echo $row['id']; ?></td> 
                    <td><?php echo $row['nomecliente']; ?></td>
                    <td><?php echo $row['cpfcliente']; ?></td> 
                    <td>
<div id="es">   
                      <form action="cliente_editar.php">
            <input type="hidden" name="id" value="<?php echo $id= $row['id']; ?>">
            
            <button type="submit" class="btn btn-warning" >Alterar</button> 
                      
                      </form>
           </div>
<div id="direita">
            <form action="cliente_deletar.php" method="post" >
            <input type="hidden" name="id" value="<?php echo $id= $row['id']; ?>">
            <br>
            <input type="hidden" name="valor" value="1">
            <button type="submit" class="btn btn-danger">Deletar</button> 
        
          </form>
                  


           </div>
                      
                      <?php } 
            ?>
            
            -->




