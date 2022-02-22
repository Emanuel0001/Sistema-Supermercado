<?php 
$entrada=0; 
$totaltroco=0;

// 
$entra= @$_POST['entra'];
if(isset($entra)){
$entrada=$_POST['entrada'];
}


// 
$valor= @$_POST['valor'];
if(isset($valor)){
$qtde_venda = $_POST['qtdvenda']; 
$produto=$_POST['produto'];
header("location: telaprincipal.php");
}
session_start();
if(!$_SESSION['id']){
session_destroy();
header("Location: index.php?erro=0");}
?>


<html>

<head>   
	<title>Sistema</title>
	<link rel="shortcut icon" href="systemicon.PNG" type="image/x-PGN"/>       
</head>
	


 
 <body >

 				<!-- menu -->
			<style type="text/css">
			#menu{top: 0px;}
			#qtd{float: right; padding: 0 300px 0 0;}
			</style>
			
			<!--  -->
 			<!-- inclui cabeçalho//menu -->
			<?php include ("sis_cabecalho.php"); ?>

		    <div id="Centro">

			
			<h1><img src="img/caixa2.png"> CAIXA <img src="img/caixa2.png"></h1>

			<!-- Formulario add produto -->
			<form  method="post"  >
			<input type="hidden" name="valor" value="1">
			

			<label for="exampleInputEmail1"><img src="img/leitorcodigo.png"> Codigo ou Nome</label>
			<div id="qtd"><label for="exampleInputEmail1">Quantidade</label></div>
			<br>
			
			<input type="varchar" name="produto" style="width:50%; height:25px; "  placeholder="Código Produto" required/>
			<input type="varchar" name="qtdvenda" style="width:15%;height:25px;" value="1" required/>
			<td colspan='2' align="right">
			<input type="image"   src="img/cesta.png" value="Adicionar" name="adicionar" id="campo">
			</form>
	
			<!-- Botao Nova Venda -->
 			<form action="deleta_resumo.php" method="post" >
            <input type="hidden" name="id" value="<?php echo $id= $row['id']; ?>">
            <input type="hidden" name="valor" value="1">
            <input type="submit" value="Nova Venda" name="button" id="button" >
          	</form>


          	
<?php
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


$sql = "SELECT nomeproduto,codigoproduto,precoproduto,quantidadeproduto FROM produto";
$pagamentototal=0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$bdcodigoproduto=$row["codigoproduto"];
$bdnomeproduto=$row["nomeproduto"];
$precoproduto=$row["precoproduto"];
	
if(isset($_POST['adicionar'])){
if(!isset($_SESSION['qproduto']))
$_SESSION['qproduto'] = 0;


if ($produto == $bdnomeproduto || $produto == $bdcodigoproduto) {
 
 $sql = "INSERT INTO resumo_venda(nomeproduto,precoproduto,quantidadeproduto) 
         VALUES ('$bdnomeproduto','$precoproduto','$qtde_venda')"; 
         $conn -> query($sql);


$continua=0;
while($continua == 0) {
	$preco= $row['precoproduto'];
    $qtd=$qtde_venda;	
	$total= $preco * $qtd;
	$pagamentototal+=$total; ?>	

<?php 
$continua= 1;

}$_SESSION['qproduto']++; }}}} else { echo "0 results";}

?>
<?php  
$sql = "SELECT precoproduto,quantidadeproduto FROM resumo_venda";
$totalpreco=0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$quantidadeproduto=$row["quantidadeproduto"];
$precoproduto=$row["precoproduto"];
// soma do preço total
$totalpreco+= $quantidadeproduto* $precoproduto;}
// soma do troco
$totaltroco=$entrada-$totalpreco; }
?>

<div id="direita">
<!-- Preço total -->

<span class="total">Total: <?php echo "R$ "; echo number_format($totalpreco / 1, 2, ",", ".");?></span>

						<form action="telaprincipal.php" method="post">
						<input type="varchar"  placeholder="Troco: R$ 0.00" name="entrada" style="width:130px; background: #FFF; " required>
						<input type="hidden" name="entra" value="1" >
						</form>
<style type="text/css">.total{
	  color: #FFF;
	  
	  background: blue;
	  font-family: arial;
	  font-size: 16px;
	  padding: 5px 5px;
	  border-radius: 5px;

	}
	span{border-radius: 5px;}</style>

</div>

<?php if ($entrada>0): ?><br>
<!-- devolução//troco -->
<span id="red">Devolução: <?php echo "R$ "; echo number_format($totaltroco / 1, 2, ",", ".");?></span>
<!-- Recebido//valor recebido -->
<span id="troco">Recebido: <?php echo "R$ "; echo number_format($entrada / 1, 2, ",", ".");?></span>
<br>



						<!-- Cumpom Fiscal -->
						<br>
						<form action="cupom_fiscal.php" method="post">
						<input type="double" name="totalpreco" id="test"value="<?php echo $totalpreco ?>">
						<input type="image"   src="img/imprimir.png " onmouseover="getElementById('descricao').style.display='block'"
						 onmouseout="getElementById('descricao').style.display='none'" 
						 value="<?php  $totalpreco ?>">
						</form>
<?php endif ?>



<div id="descricao" ><font color=black>Imprimir Cupom!</font></div>







<!-- Tabela Lista de produtos -->
<table id="alter" border="2"  style="width:900px">

<tr><td colspan="5" align="center"><font color=blue>Lista de Produtos</td></tr>

<tr><td>ID</td><td><font color=blue>Nome Produto</td><td><font color=blue>Preço Item</td><td><font color=blue>Qtd</td><td><font color=blue><center>Ações</center></td></tr>

<!-- copor da tabela -->
<tbody> 
    		 	 <?php
    		 	 
                    include ("mysql.class.php");
                    $obj_mysql = new Mysql();
                    $cont=0;
                    $resultado=$obj_mysql->fetch_all("resumo_venda");
                    while($row = $resultado->fetch_assoc()) {?>
				    <?php 
				    if ($cont >=0){ 
				    $cont= $cont +1;}
				    $precoproduto=$row['precoproduto'];?>
                    
                    <tr><td scope="row"><?php echo $cont; ?></td> 
				    <td><?php echo $row['nomeproduto']; ?></td>
				    <td><?php echo "R$ ";  echo number_format($precoproduto / 1, 2, ",", "."); ?></td> 
				    
				    <!--Formulario edição de qtd produto -->
				    <td style="width:50px">
					<form action="alterar_qtd.php" method="POST">
					<input type="double" name="quantidadeproduto" style="width:50px"  value="<?php echo $quantidadeproduto = $row['quantidadeproduto']; ?>">
					<input type="hidden" name="id" value="<?php echo $id= $row['id']; ?>" >
					<input type="hidden" name="valor" value="1" >
					</form></td> 
				    		 		
				    		 		
				    		 		<td  >

				    		
					<div id="direita">
		            <form action="produto_deletar.php" method="post" >
		            <input type="hidden" name="id" value="<?php echo $id= $row['id']; ?>">
		            <input type="hidden" name="valor" value="1" >
		  			<input type="image" img src="img/menos.png">
		          	</form></td> 
		             <?php } ?>        
		    		</div>
    		 
</tbody>
</table>

</script>

<!-- hora e data -->
<br><br>
	<script language="JavaScript">

	document.write("<font color='blue' size='4' face='arial'>")
	var mydate=new Date()
	var year=mydate.getYear()
	if (year<2000)
	year += (year < 1900) ? 1900 : 0
	var day=mydate.getDay()
	var month=mydate.getMonth()
	var daym=mydate.getDate()
	if (daym<10)
	daym="0"+daym
	var dayarray=new Array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado")
	var montharray=new Array(" de Janeiro de "," de Fevereiro de "," de Março de ","de Abril de ","de Maio de ","de Junho de ","de Julho de ","de Agosto de ","de Setembro de "," de Outubro de "," de Novembro de "," de Dezembro de ")
	document.write("   "+dayarray[day]+", "+daym+" "+montharray[month]+year+" ")
	document.write("</b></i></font>")
	</script>

</div>
</div>

		


</body>
	


</html>
	
