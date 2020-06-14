
<?php
require_once("../model/livroDb.php");
class ControllerListar{
    private $livroDb;

    public function __construct(){
        $this->livroDb = new LivroDB();
        $this->CriarTabela();
    }

    public function CriarTabela(){
        $result = $this->livroDb->getLivro();

        foreach($result as $livro){
            echo("<tr>");
            echo("<th>".$livro['id']."</th>");
            echo("<td>".$livro['nome']."</td>");
            echo("<td>".$livro['autor']."</td>");
            echo("<td>".$livro['preco']."</td>");
            echo("<td><a class='btn btn-warning' href='editar.php?id=".$livro['id']."'>Editar</a> <a class='btn btn-danger' href='../controller/controllerExcluir.php?id=".$livro['id']."'> Excluir </a> </td>");        
            echo('</tr>');
        }
    }
}

?>