
<?php

require_once("../model/livro.php");

class ControllerCadastrar{
    private $livro;

    public function __construct(){
        $this->livro = new Livro();
        $this->cadastrar();
    }

    private function cadastrar(){
        $this->livro->setNome($_POST['nome']);
        $this->livro->setAutor($_POST['autor']);
        $this->livro->setPreco($_POST['preco']);
        
        $resultado = $this->livro->incluir();
        if($resultado>=1){
            echo("<script>alert('Livro cadastrado com sucesso!');document.location='../view/cadastro.php'</script>");
        }else{
            echo("<script>alert('Infelizmente seu livro não foi cadastrado!');history.back()</script>");
        }
    }
}
new ControllerCadastrar();
?>