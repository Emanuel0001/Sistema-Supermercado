<html >
  <head>
    <meta charset="UTF-8">
    <title>Sistemaweb</title>
    
  <link rel="shortcut icon" href="img/systemicon.PNG" type="image/x-PGN"/>  
    
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>

  <body>
<?php
     
      @$erro= $_GET['erro'];
  
  if($erro){?>
  <script>alert('Usuario ou senha incorretos!');</script>  
 <?php } ?>

<div id="central">

<div id="login">
  
  <h1> Informe seu Usuário e senha</h1>
<div id="left">
<img src="computer.png">
  </div>

  <form nome="signup" method="post" action="login.php">
<center>
    <input type="text" placeholder="Usuario" name="email" required>
    <input type="password" placeholder="Senha" name="senha" required>
    <input type="submit" value="Entrar" > </center>
  
  
  </form>
  

  
</div>
</div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
 
  </body>
</html>