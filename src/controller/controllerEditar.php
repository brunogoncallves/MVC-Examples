
require_once("../model/livroDb.php");

class ControllerEditar{
    private $nome;
    private $autor;
    private $preco;
    private $livroDb;
    private $id;

    public function __construct($id){
        $this->livroDb = new LivroDB();
        $this->id = $id;
        $this->criarFormulario($id);
    }

    public function criarFormulario($id){        
        $row = $this->livroDb->getLivroById($id);
        $this->nome = $row['nome'];
        $this->autor = $row['autor'];
        $this->preco = $row['preco'];
    }

    public function getNome(){
        return $this->nome;
    }
    public function getId(){
        return $this->id;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function getPreco(){
        return $this->preco;
    }

    public function setNome($nome){
        $this->nome= $nome;
    }
    public function setAutor($autor){
        $this->autor= $autor;
    }
    public function setPreco($preco){
        $this->preco= $preco;
    }

    public function editarFormulario($nome, $autor, $preco, $id){
        
        if($this->livroDb->updateLivro($id,$nome, $autor, $preco)==TRUE){
            echo("<script>alert('Livro editado com sucesso!');document.location='../view/index.php'</script>");
        }else{
            echo("<script>alert('Infelizmente seu livro não foi editado!');history.back()</script>");
        }
    }
}

$id = filter_input(INPUT_GET, 'id');
$editar = new ControllerEditar($id);
if(isset($_POST['submit'])){ 
    $editar->editarFormulario($_POST['nome'], $_POST['autor'], $_POST['preco'], $_POST['id']);
}
?>