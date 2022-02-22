<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">



</head>

<body><?php 


include ("sis_cabecalho.php"); ?>

	<div id="centro">
	<h1>Cadastro de Clientes</h1>
	<table id="alter" border="2"  style="width:600px">
	<form name ="formcliente" method="POST" action="cadastrocliente.php">

	

	<input  placeholder="Nome" type="text" name="nomecliente"  required><br>
	<input   placeholder="CPF" type="text" name="cpfcliente" maxlength="11" required><br>
	<input  placeholder="RG"type="text" name="rgcliente" maxlength="10" required><br>
	<input   placeholder="Contato"type="text" name="celularcliente" maxlength="11" required><br>
	<input type="hidden" name="valor" value="1">
	
    <center><input type="submit" value="Salvar"></center>

		

	</form>
</table>

</div>




</body>
</html>

<?php


$valor= @$_POST['valor'];

if(isset($valor)){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banco_supermercado";
// Cria uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);
// checa a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
} 




?>


<?php
$nome =$_POST['nomecliente'];
$cpf =$_POST['cpfcliente'];
$rg =$_POST['rgcliente'];
$celular =$_POST['celularcliente'];

$sql =  "INSERT INTO cliente(nomecliente,cpfcliente,rgcliente,celularcliente) VALUES ('$nome','$cpf','$rg','$celular')";
$conn -> query($sql);

     

}


?>
  