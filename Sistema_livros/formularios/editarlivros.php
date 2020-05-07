
 <?php 
    spl_autoload_register(function ($class_name) {
        include '../classes/'.$class_name . '.php';   
    });

    $livro=new Livros();
  
    if(isset($_POST["titulo"])){
        $id=$_POST["id"];
        $titulo=$_POST["titulo"];
        $autor=$_POST["autor"];
        $editora=$_POST["editora"];
        $quantidade_pagina=$_POST["quantidade_pagina"];
        $descricao=$_POST["descricao"];
        $ano=$_POST["ano"];

        $livro->setTitulo($titulo);
        $livro->setAutor($autor);
        $livro->setEditora($editora);
        $livro->setQuantidadepagina($quantidade_pagina);
        $livro->setDescricao($descricao);
        $livro->setAno($ano);

        if($livro->update($id)){
            echo "alterado com sucesso";
            header("Location:listar.php?pesquisa=");
        }
    }
    if(isset($_GET['codigo']) && $_GET['codigo'] == 'editar'){
        $id = (int)$_GET['idlivro'];
        $resultado=$livro->find($id);
    }
 ?>

<!DOCTYPE html>
<html>
<head></head>
<body>
    <form method="POST" action="editarlivros.php">
       <input type="text" name="titulo" placeholder="Titulo" value=" <?= $resultado->titulo; ?>" >
       <input type="text" name="autor" placeholder="Autor" value=" <?= $resultado->autor; ?> ">
       <input type="text" name="editora" placeholder="Editora" value="<?= $resultado->editora; ?>">
       <input type="text" name="quantidade_pagina" placeholder="Quantidade de página" value="<?= $resultado->quantidade_pagina; ?>">
       <input type="text" name="descricao" placeholder="descricao" value="<?= $resultado->descricao; ?>">
       <input type="text" name="ano" placeholder="Ano de publicacao" value="<?= $resultado->ano; ?>">
       <input type="hidden" name="id" value="<?= $resultado->idlivro; ?>">
       <input type="submit" name="atualizar" value="Atualizar">
    </form>
</body>
</html>