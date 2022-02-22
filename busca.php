<html>
<head>
<link rel="stylesheet" type="text/css" href="telaprincipal.css">
</head>
<body>
<table  align="center" border="2"  style="width:100%" ID="alter">
	<thead>
<tr>
<td>ID</td> <td>Nome</td> <td>Debito</td>
</tr>
</thead>
	
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
} else {
	
}





$busca =  $_POST['busca'];

$query = mysqli_query($conn, "SELECT * FROM cliente WHERE nomecliente LIKE '%$busca%'");
$num   = mysqli_num_rows($query);
if($num >0){
    while($row = mysqli_fetch_assoc($query)){


    	echo  "<tr><td>".$row['id']."</td><td>".$row['nomecliente']."</td><td>".$row['cpfcliente']."</td></tr>";

     
    	
    }
}else{
  echo "Esta Pessoa Não Existe!";
}

?>
 

 
 
</body>
</html>