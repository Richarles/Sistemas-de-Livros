
 <?php 
    spl_autoload_register(function ($class_name) {
        include '../classes/'.$class_name . '.php';   
    });
    $livro=new Livros();
  
    if(isset($_POST["titulo"])){
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

        if($livro->insert()){
            header("Location:listar.php?pesquisa=");
        }

    }
 ?>

<!DOCTYPE html>
<html>
<head></head>
<body>
    <form method="POST" action="cadastrar.php">
       <input type="text" name="titulo" placeholder="Titulo">
       <input type="text" name="autor" placeholder="Autor">
       <input type="text" name="editora" placeholder="Editora">
       <input type="text" name="quantidade_pagina" placeholder="Quantidade de página">
       <input type="text" name="descricao" placeholder="descricao">
       <input type="text" name="ano" placeholder="Ano de publicacao">
       <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
</body>
</html>