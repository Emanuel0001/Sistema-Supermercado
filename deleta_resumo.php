<?php
 
$valor= @$_POST['valor'];

if(isset($valor)){

//error_reporting(0);
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

$sql = "DELETE  FROM resumo_venda WHERE id != 387";
$conn -> query($sql);

	header("location: telaprincipal.php");
   

}
 
?>
        