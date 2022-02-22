<html>
<head>
	<title></title>
</head>
<body>
	
 <a href="telaprincipal.php">Imprimir e Voltar</a><br><br>
<div id="table"><table id="alter" border="1px "  style="width:300px">
<tr><td colspan="5" align="center">Supermercado M&E	</td></tr> 
<tr><td>R. tiago silva, 110 Centro                 
          Cidade - MG CEP 39.538-000</td></tr>
          <td>CNPJ 00.000.000/0000-00 </td><style type="text/css">
a{
	width: 100px;
font-size: ;
color: #FFF;
font-weight: 800;
border: solid 1px #FFF;
background-color: red;
padding: 0.5%;
border-radius: 5px;}
#table{
width: 300px;
background:  #EEDD82; 
font-style: normal;
font-weight: 700;
position: absolute;
left: 40%;
top: 1%;
}
table {
	padding: 0%;
font-size: ;
color: black;
  background:  #EEE8AA; 
  font-style: normal;
  font-weight: 700;
  }


table#alter tr td { /* Toda a tabela com fundo creme */
padding: 0%;
text-align: center;
background:   #EEE8AA;
border:1px dashed #EEE8AA;
  } 
table#alter tr.dif td {

   /* Linhas com fundo cinza */
  }


 </style><table id="alter" border="1"  style="width:300px">
<tr><td colspan="5" align="center">Cupom Fiscal</td></tr><table id="alter" border="1"  style="width:300px">
<tr><td>ID</td><td>Qtd. Item<td>Descrição</td><td>Valor Item(R$)</td></tr>
 
 <?php
 $totalpreco= $_POST['totalpreco'];
 include ("mysql.class.php");
 $obj_mysql = new Mysql();
$resultado=$obj_mysql->fetch_all("resumo_venda");
                     while($row = $resultado->fetch_assoc()) {?>
				                <?php
				            $cont=0;
				             if ($cont >=0){ 
				                	$cont= $cont +1;}
				                	$precoproduto=$row['precoproduto'];
                                    $nomeproduto=$row['nomeproduto'];
                                    $quantidadeproduto=$row['quantidadeproduto'];
                                    ?>
                     


<tr> 
	<td scope="row"><?php echo $cont; ?></td> 
	<td><?php  echo $quantidadeproduto?></td> 
	<td><?php echo $nomeproduto ?></td>
	<td><?php echo "R$ ";  echo number_format($precoproduto / 1, 2, ",", "."); ?></td> 


<?php 
				            }?>
 <tbody>
 	<table id="alter" border="1"  style="width:300px">
<tr>
	<td>---------------------------------</td>

	<td>Total: <?php echo "R$ "; echo number_format($totalpreco / 1, 2, ",", "."); ?></td></tr>
</div>
				         </body>
</html>