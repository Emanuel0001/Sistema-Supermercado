<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">



</head>

<body><?php include ("sis_cabecalho.php"); ?>
<?php
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

<center>
<table  align="center" border="2"  style="width:500px" ID="alter">
	<tr class="dif"> 
		
	
<tr><td colspan="10" align="center">Estoque baixo</td><br></tr>
<tr><td colspan="1">Nome Produto</td><td>Qtd<td>Preço U.</td><td>Total P. </td><td>Status 
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
	
	
	
if ($row['quantidadeproduto'] < 50) {
	echo  "<center><tr><td><font color= #0013ff>".$row['nomeproduto']."</font></td><td>".$row['quantidadeproduto'].
	"</td></td>"."</td><td>"."$".$row['precoproduto']."</td><td>".$total."</td>";
	
		echo "<td><font color='red'><center>Qtd Baixa</center></font><td></tr>";
	}
	
}} else {

echo "0 results";

}
?>
</table>
</div>


</body>
</html>