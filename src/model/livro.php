
<?php
require_once 'livroDb.php'; //inclusão de arquivo

class Livro extends LivroDB{ //relação de herança
    //atributos
    private $nome;
    private $autor;
    private $preco;

    //métodos
    public function getNome(){
        return $this->nome;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function getPreco(){
        return $this->preco;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setAutor($autor){
        $this->autor = $autor;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }
    public function incluir(){ //metodo para incluir o livro
        return $this->setLivro($this->getNome(), $this->getAutor(), $this->getPreco());
        //o método setLivro pertence ao pai do livro (veja a herança)
    }

}