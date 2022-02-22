
<html>
<head><link rel="stylesheet" type="text/css" href="telaprincipal.css">



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Sistema de Busca</title>

    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="telaprincipal.css">
    <link href="https://getbootstrap.com/docs/3.3/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">

    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>
<style type="text/css">
#centro{
  width: 50%;
  height: 25%;
font-size: 20px;
color: #FFF;
}
</style>
<?php include ("sis_cabecalho.php"); ?>
    <div id="centro">

      <div class="header clearfix">
     <h1>Debito de Contas</h1>
   
        
      </div>
      <div class="row marketing">
        <div class="col-lg-12">
          <form >
            <input id="busca" type="text"  class="form-control" placeholder="Buscar Cliente">
          </form>
          <br>
          <p id="result"></p>
        </div>
      </div>


     <!-- /container -->
    <script>
      $("#busca").keyup(function(){
        var busca = $("#busca").val();
        $.post('busca.php', {busca: busca},function(data){
          $("#result").html(data);
        });
      });
      $("#busca").focusout(function(){
        $("#result").html("Pesquisar Por Clientes!");
      })

    </script>
    <form action="produto_deletar.php" method="post" >
                <input type="hidden" name="id" value="<?php echo $id= $row['id']; ?>">
                <input type="hidden" name="id" value="<?php echo $nomecliente= $row['nomecliente']; ?>">
                <input type="hidden" name="id" value="<?php echo $debito= $row['debito']; ?>">
                <input type="hidden" name="valor" value="1" >
            <input type="submit" value="OK" id="x" style="width:50px" >
                </form></td>
  </div>
  </body>
</html>
<?php 

?>
   