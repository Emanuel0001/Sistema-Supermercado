<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
<meta charset="UTF-8">
</head>


<body><?php include ("sis_cabecalho.php"); ?>

	<div id="centro">
	<h1>Cadastro de Produtos</h1>
	<form name ="formprodutos" method="POST" action="produtos.php">

	

	<input  placeholder="Nome" type="text" name="nomeproduto" required>
	<input   placeholder="Código de Barra" type="int" name="codigoproduto" required>
	<input   placeholder="Preço" type="float" name="precoproduto" required>
	<input   placeholder="Quantidade" type="int" name="quantidadeproduto" required>
    
<input type="hidden" name="valor" value="1">
		<center><input type="submit" value="Salvar"></center>

	</form>


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




	# code...
$nomeproduto =$_POST['nomeproduto'];
$codigoproduto =$_POST['codigoproduto'];
$precoproduto =$_POST['precoproduto'];
$quantidadeproduto =$_POST['quantidadeproduto'];

$sql =  "INSERT INTO produto(nomeproduto,codigoproduto,precoproduto,quantidadeproduto) VALUES ('$nomeproduto','$codigoproduto','$precoproduto','$quantidadeproduto')";
$conn -> query($sql);

}
?>
