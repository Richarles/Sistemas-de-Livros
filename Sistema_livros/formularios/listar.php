<?php 
       spl_autoload_register(function ($class_name) {
        include '../classes/'.$class_name . '.php';   
    });

      $livro=new Livros();
      
        //$pesquisa =" ";
        if(isset($_GET["pesquisa"])){
          $pesquisa = $_GET["pesquisa"];
          $livro->findAll();
          }

          if(!$livro->findAll()){
            echo "Erro ao realizar pesquisa";
          }
          if($livro->findAll()){
           echo '<h2><a href="listar.php?pesquisa=">Listas de Livros</a></h2>';    
           } 
      ?>

<!DOCTYPE html>
<html>
<head></head>
<body> 
<body> 
    <form action ="listar.php" method = "GET">
    <input type = "search" name = "pesquisa">
    <input type = "submit" value  = "Pesquisar">
    </form> 
   <a href="cadastrar.php"><input type="button" value="Cadastro"></a>

   <?php foreach($livro->findAll() as $key => $value){ ?>
    <ul>
     <li><a><?php echo $value['titulo']; ?></a> <li>
     <li><?php echo"<a href='excluirlivros.php?codigo=excluir&idlivro=".$value['idlivro']."'>Excluir</a>"; ?></li>
     <li><?php echo"<a href='editarlivros.php?codigo=editar&idlivro=".$value['idlivro']."'>Editar</a>"; ?></li>
     </ul>
  <?php } ?>

</body>
</html>