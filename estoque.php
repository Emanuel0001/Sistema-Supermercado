<html>
<head>
<title>Meu estoque</title>
</head>
<body>
<?php include ("sis_cabecalho.php"); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banco_supermercado";
// Cria uma conexão
$conn = new mysqli($servername,$username,$password,$dbname);
// checa a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>
<center>
<table  align="center" border="2"  style="width:700px" ID="alter">
	<tr class="dif"> 
		
	
<tr><td colspan="10" align="center">Estoque de Produtos</td><br></tr>
<tr><td colspan="1">Nome Produto</td><td>Qtd<td>Preço (R$)</td><td>Total P. </td><td>Status <font color='blue'>[X]</font> <font color= #24960d>[X]</font>
<font color='red'>[X]</font></td>
</tr>

<?php
$sql = "SELECT nomeproduto,precoproduto,quantidadeproduto,precoproduto,codigoproduto FROM produto";
$lx=0;
$lucro=0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
	$preco= $row['precoproduto'];
    $qtd=$row['quantidadeproduto'];	
	$total= $preco * $qtd;
	$lucro+=$total*0.3;
	$lx+=$total;
	
	

 	
	echo  "<center><tr><td><font color= #0013ff>".$row['nomeproduto']."</font></td><td>".$row['quantidadeproduto'].
	"</td></td>"."</td><td>";
	?>
					<form action="alterar_qtd.php" method="POST">
					<input type="double" name="precoproduto" style="width:50px" 
					value="<?php echo number_format($precoproduto = $row['precoproduto']/ 1, 2, ".", "."); ?>">
					<input type="hidden" name="id" value="<?php echo $codigoproduto= $row['codigoproduto']; ?>" >
					<input type="hidden" name="valor1" value="1" >
					</form> 
	</td><td>
	<?php 
	



	echo "R$".$total."</td>";
	if ($row['quantidadeproduto'] > 100 && $row['quantidadeproduto'] < 1000 ) {
		echo "<td><font color='blue'><center>Qtd Alta</center></font><td></tr>";
	}
	if ($row['quantidadeproduto'] > 50 && $row['quantidadeproduto'] <= 100 ) {
		echo "<td><font color=#24960d><center>Qtd Moderada</center></font><td></tr>";

	}
	if ($row['quantidadeproduto'] < 50) {
		echo "<td><font color='red'><center>Qtd Baixa</center></font><td></tr>";
	}
	
}
} else {

echo "0 results";

}

?>

<style>
#button{
	height: 5%;
	color: green;
background-color: #FFF;
}
#camponome{
	color: green;
background-color: #FFF;
}
</style>

</table>
<div id="div">
<span  id="button"><img src="img/money.png">   Estoque: $<?php  echo number_format($lx / 1, 2, ",", ".");?></span>

<br><br>
<span id="camponome"><img src="img/lucro.png">   Lucro: $<?php  echo number_format($lucro / 1, 2, ",", ".");?></span>



</div>
<br><div id="center">
<form action="buscaproduto.php" method="post">
	
	<input placeholder="Buscar Produto" type="varchar" name="produto">
	
</form>
</div>

</div>
</body>
</html>