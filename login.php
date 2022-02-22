
<html>
<head>
	<title></title>

<script type="text/javascript">
	var pregresso = new Number();
	var maximo = new Number();
	var pregresso = 0;
	var maximo = 60;

	function start(){
if ((pregresso + 1) < maximo) {
document.getElementById("pg").value=pregresso;
setTimeout("start();",100);


}} 
</script>

</head>
<body >

	<style type="text/css">
	span{ color: #fff; font-size: 15px;}
.centro{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);}
	
progress{	
 }
body{background: black}	
	</style>
<div class="centro">

<center><span>Carregando...</span></center>

<progress  id="pg" max="60"></progress>	
 
</div>


</body>
</html> 



<?php    

include ("mysql.class.php");
$email= $_POST['email'];
$senha= $_POST['senha'];
 $obj_mysql = new Mysql();
$result=$obj_mysql->select($email,$senha);
if($result)
 header("refresh: 1; telaprincipal.php");
  
  
else 
	header('Location: index.php?erro=1');   

?>