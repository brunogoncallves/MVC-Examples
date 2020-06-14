
<?php
require_once("../config/db.php");
class LivroDB{
    protected $mysqli;
    
    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(DB_SERVIDOR, DB_USUARIO, DB_SENHA, DB_BANCO);
    }
    public function setLivro($nome, $autor, $preco){                
        $sql = $this->mysqli->prepare("INSERT INTO livros (`nome`, `autor`, `preco`) VALUES (?,?,?)");
        $sql->bind_param("sss",$nome, $autor, $preco);
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }  

    public function getLivro(){
        $sql = $this->mysqli->query("SELECT * FROM livros");
        while($row = $sql->fetch_array(MYSQLI_ASSOC)){
            $array[]=$row;
        }
        return $array;
    }

    public function deleteLivro($id){
        $sql = $this->mysqli->prepare("DELETE FROM `livros` WHERE `id`= ?");
        $sql->bind_param("s", $id);
        if($sql->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function updateLivro($id, $nome, $autor, $preco){
        $sql = $this->mysqli->prepare("UPDATE `livros` SET `nome` = ?, `autor` = ?, `preco` = ? WHERE `id` = ? ");
        $sql->bind_param("ssss",$nome, $autor, $preco, $id);
        if($sql->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }
    
    public function getLivroById($id){
        $sql = $this->mysqli->query("SELECT * FROM livros WHERE id = '$id'");
        return $sql->fetch_array(MYSQLI_ASSOC);            
        
    }
}