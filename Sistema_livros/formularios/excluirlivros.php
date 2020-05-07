<?php 
             spl_autoload_register(function ($class_name) {
                include '../classes/'.$class_name . '.php';   
            });
        

    $livro=new Livros();

    if(isset($_GET['codigo']) && $_GET['codigo'] == 'excluir'){
        $id = (int)$_GET['idlivro'];
        
        if($livro->delete($id)){
            header("Location:listar.php?pesquisa=");
        }
    }

    ?>


<!DOCTYPE html>
<html>
<head></head>
<body>
</body>
</html>