
<?php

require_once("../model/livroDb.php");

class ControllerExluir{
    private $livroDb;

    public function __construct($id){
        $this->livroDb = new LivroDB();
        if($this->livroDb->deleteLivro($id)==TRUE){
            echo("<script>alert('Livro exlcuido com sucesso!');document.location='../view/index.php'</script>");
        }else{
            echo("<script>alert('Infelizmente seu livro não foi excluído!');history.back()</script>");
        }
        
    }
}

new ControllerExluir($_GET['id']);

?>