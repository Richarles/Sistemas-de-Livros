<?php 
   require_once 'Crud.php';
   require_once 'Banco.php';
   class Livros extends Crud{
       protected $table='livros';
       protected $titulo;
       protected $autor;
       protected $editora;
       protected $quantidade_pagina;
       protected $descricao;
       protected $ano;

    public function setTitulo($titulo){
        $this->titulo=$titulo;
       }
    public function getTitulo(){
        return $this->titulo;
       }

    public function setAutor($autor){
        $this->autor=$autor;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function setEditora($editora){
        $this->editora=$editora;
    }
    public function getEditora(){
        return $this->editora;
    }
    public function setQuantidadepagina($quantidade_pagina){
        $this->quantidade_pagina=$quantidade_pagina;
    }
    public function getQuantidadepagina(){
        return $this->quantidade_pagina;
    }
    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setAno($ano){
        $this->ano=$ano;
    }
    public function getAno(){
        return $this->ano;
    }

    public function insert(){
        $sql="INSERT INTO $this->table (titulo,autor,editora,quantidade_pagina,descricao,ano) 
        VALUES(:titulo,:autor,:editora,:quantidade_pagina,:descricao,:ano)";
        $stmt=Banco::prepare($sql);
        $stmt->bindParam(':titulo',$this->titulo,PDO::PARAM_STR);
        $stmt->bindParam(':autor',$this->autor,PDO::PARAM_STR);
        $stmt->bindParam(':editora',$this->editora,PDO::PARAM_STR);
        $stmt->bindParam(':quantidade_pagina',$this->quantidade_pagina,PDO::PARAM_INT);
        $stmt->bindParam(':descricao',$this->descricao,PDO::PARAM_STR);
        $stmt->bindParam(':ano',$this->ano,PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function update($id){
        $sql="UPDATE $this->table SET titulo= :titulo,autor= :autor,editora= :editora,
        quantidade_pagina= :quantidade_pagina,descricao= :descricao,ano= :ano WHERE idlivro = :id "; 
        $stmt=Banco::prepare($sql);
        $stmt->BindParam(':titulo',$this->titulo,PDO::PARAM_STR);
        $stmt->BindParam(':autor',$this->autor,PDO::PARAM_STR);
        $stmt->BindParam(':editora',$this->editora,PDO::PARAM_STR);
        $stmt->BindParam(':quantidade_pagina',$this->quantidade_pagina,PDO::PARAM_INT);
        $stmt->BindParam(':descricao',$this->descricao,PDO::PARAM_STR);
        $stmt->BindParam(':ano',$this->ano,PDO::PARAM_INT);
        $stmt->BindParam(':id',$id,PDO::PARAM_INT);

        return $stmt->execute();
    }

   }
?>