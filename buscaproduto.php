<html>
<head><link rel="stylesheet" type="text/css" href="telaprincipal.css"></head>
<body>

<?php include ("sis_cabecalho.php"); ?>

<center>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projeto";
// Cria uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);
// checa a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?><?php
$produto =$_POST['produto'];
?>
<table  align="center" border="2"  style="width:500px" ID="alter">
	<tr class="dif"> 
		
	
<tr><td colspan="10" align="center">Estoque de Produtos</td><br></tr>
<tr><td colspan="1">Nome Produto</td><td>Qtd<td>Preço U.</td><td>Status <font color='blue'>[X]</font> <font color= #24960d>[X]</font>
<font color='red'>[X]</font></td>
</tr>

<?php
$sql = "SELECT * FROM produto WHERE nomeproduto LIKE '%$produto%'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

	

	echo  "<center><tr><td><font color= #0013ff>".$row['nomeproduto']."</font></td><td>".$row['quantidadeproduto'].
	"</td></td>"."</td><td>"."$".$row['precoproduto']."</td>";
	if ($row['quantidadeproduto'] > 100 && $row['quantidadeproduto'] < 1000 ) {
		echo "<td><font color='blue'><center>Qtd Alta</center></font><td></tr>";
	}
	if ($row['quantidadeproduto'] > 50 && $row['quantidadeproduto'] <= 100 ) {
		echo "<td><font color=#24960d><center>Qtd Moderada</center></font><td></tr>";

	}
	if ($row['quantidadeproduto'] < 50) {
		echo "<td><font color='red'><center>Qtd Baixa</center></font><td></tr>";
	}
}}
?>
</table>
</center>






</body>
</html>
