<head></head>
	<body><?php include ("sis_cabecalho.php"); ?>
<style type="text/css">
#tt{
  position: absolute;
  top: 10%;
  left: 40%;
}
</style>
	<div id="tt">
  <a href="usuario_adicionar.php"class="btn btn-primary">Adicionar</a>

    	<table id="alter" border="2"  style="width:400px" > 
    		<thead>
    			   <tr>
    			       <td>id</td>  <td>Email</td> <td>Ações</td>  
    			   </tr> 
    		</thead>
    		 <tbody> 
    		 	 <?php
                     include ("mysql.class.php");
                     $obj_mysql = new Mysql();
                     $resultado=$obj_mysql->fetch_all("login");
                     while($row = $resultado->fetch_assoc()) {?>
				                
                                <tr> 
				    		 		<td scope="row"><?php echo $row['id']; ?></td> 
				    		 		<td><?php echo $row['email']; ?></td> 
				    		 		<td>

				    		 	<div id="es">		
				              <form action="usuario_editar.php">
            <input type="hidden" name="id" value="<?php echo $id= $row['id']; ?>">
            
            <button type="submit" class="btn btn-warning" >Alterar</button> 
                      
                      </form>
           </div>
<div id="direita">
            <form action="usuario_deletar.php" method="post" >
            <input type="hidden" name="id" value="<?php echo $id= $row['id']; ?>">
            <br>
            <input type="hidden" name="valor" value="1">
            <button type="submit" class="btn btn-danger">Deletar</button> 
        
          </form>
                      <?php } 
            ?>
    		 	 </div>
    		 
    	    </tbody>
    	 </table>
       
    



</body>
</html>
