<?php
class Mysql {
    
    public $conn;
    function __construct(){
        
        $servername = "localhost"; // Nome do servidor local
        $username = "root"; // nome de usuário do mysql 
        $password = ""; // senha do usuário do mysql
        $dbname = "banco_supermercado"; // nome do banco
        // Cria uma conexão
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // checa a conexão
        if ($this->conn->connect_error) {
            die("Falha ao conectar: " . $this->conn->connect_error);

        }
     }

   function insert($email,$senha){

        //insere dados no banco de dados
        $sql = "INSERT INTO login(email,senha) 
        VALUES ('$email','$senha')"; 
        if ($this->conn->query($sql) === TRUE) { 
            return "Registrado";
            } else { 
             return "Error: " . $sql . "<br>" . $this->conn->error;
         }

   }

  


function select($email, $senha){
     
        $sql = "SELECT id,email 
         FROM login WHERE email='$email'
          AND senha='$senha' ";
        $result = $this->conn->query($sql);
     
        if ($result->num_rows > 0) {
            $row=$result->fetch_assoc();
            session_start();
            $_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];
               return 1;

        } else {

        return 0;

       }

}

function fetch_all_cliente($tabela){
         $sql = "SELECT * FROM $tabela  ";
        $result = $this->conn->query($sql);
        return $result; 
        

}
  
function fetch_all($tabela){
         $sql = "SELECT * FROM $tabela  ";
        $result = $this->conn->query($sql);
        return $result; 
        


}
function fetch_id5($id){
        $id=(int)$id;
         $sql = "SELECT * FROM cliente WHERE id=$id  ";
        $result = $this->conn->query($sql);
        return $result;  

}
function fetch_id($id){
        $id=(int)$id;
         $sql = "SELECT * FROM login WHERE id=$id  ";
        $result = $this->conn->query($sql);
        return $result;  

}
function fetch_id_tb($id,$tabela){
        $id=(int)$id;
         $sql = "SELECT * FROM $tabela WHERE id=$id  ";
        $result = $this->conn->query($sql);
        return $result;  

}

 function delete_produto($id){


         $id=(int)$id;
        // sql to delete a record
        $sql = "DELETE FROM resumo_venda WHERE id=$id";

        if ($this->conn->query($sql) === TRUE) {
            return "Deletado";
        } else {
            return "Error deleting record: " . $this->conn->error;
        }

 }
 function delete_cliente($id){


         $id=(int)$id;
        // sql to delete a record
        $sql = "DELETE FROM cliente WHERE id=$id";

        if ($this->conn->query($sql) === TRUE) {
            return "Deletado";
        } else {
            return "Error deleting record: " . $this->conn->error;
        }

 }
 function delete($id){


         $id=(int)$id;
        // sql to delete a record
        $sql = "DELETE FROM login WHERE id=$id";

        if ($this->conn->query($sql) === TRUE) {
            return "Deletado";
        } else {
            return "Error deleting record: " . $this->conn->error;
        }

 }

  function delete_tb($id,$tabela){


         $id=(int)$id;
        // sql to delete a record
        $sql = "DELETE FROM $tabela WHERE id=$id";

        if ($this->conn->query($sql) === TRUE) {
            return "Deletado";
        } else {
            return "Error deleting record: " . $this->conn->error;
        }

 }

 function update_cliente($id,$nomecliente,$cpfcliente){

    $id=(int)$id;

    $sql = "UPDATE cliente SET nomecliente='$nomecliente',cpfcliente='$cpfcliente' WHERE id=$id";

    if ($this->conn->query($sql) === TRUE) {
        return "Atualizado";
    } else {
        return "Error updating record: " . $this->conn->error;
    }

 }


function update_qtd($id,$quantidadeproduto){

    $id=(int)$id;

    $sql = "UPDATE resumo_venda SET quantidadeproduto='$quantidadeproduto' WHERE id=$id";

    if ($this->conn->query($sql) === TRUE) {
        return "Atualizado";
    } else {
        return "Error updating record: " . $this->conn->error;
    }

 }
 

function update_preco($id,$precoproduto){

    $id=(int)$id;

    $sql = "UPDATE produto SET precoproduto='$precoproduto' WHERE id=$id";

    if ($this->conn->query($sql) === TRUE) {
        return "Atualizado";
    } else {
        return "Error updating record: " . $this->conn->error;
    }

 }


 function update($id,$email,$senha){

    $id=(int)$id;

    $sql = "UPDATE login SET email='$email',senha='$senha' WHERE id=$id";

    if ($this->conn->query($sql) === TRUE) {
        return "Atualizado";
    } else {
        return "Error updating record: " . $this->conn->error;
    }

 }


 function update_tb($id,$titulo,$tabela){

    $id=(int)$id;

    $sql = "UPDATE $tabela SET titulo='$titulo' WHERE id=$id";

    if ($this->conn->query($sql) === TRUE) {
        return "Atualizado";
    } else {
        return "Error updating record: " . $this->conn->error;
    }

 }

}










?>


