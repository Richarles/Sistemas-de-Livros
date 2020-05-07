<?php
   require_once 'Banco.php';
   
   abstract class Crud extends Banco{
       protected $table;
       //public $pesquisa ;
       abstract public function insert();
       abstract public function update($id);

       public function find($id){
           $sql="SELECT  * FROM $this->table WHERE idlivro = :id ";
           $stmt=Banco::prepare($sql);
           $stmt->bindParam(':id',$id,PDO::PARAM_INT);
           $stmt->execute();

           return $stmt->fetch();
       }

       public function findAll(){
           $sql="SELECT * FROM $this->table ";
           if(isset($_GET['pesquisa'])){
               $pesquisa = $_GET['pesquisa'];
               $sql .= "WHERE titulo LIKE :pesquisa";
           }
           $stmt = Banco::prepare($sql);
           $stmt->BindValue(':pesquisa','%'.$pesquisa.'%',PDO::PARAM_STR);
           $stmt->execute();

           return $stmt->fetchAll(PDO::FETCH_ASSOC);
       }

       public function delete($id){
           $sql="DELETE FROM $this->table WHERE idlivro= :id";
           $stmt=Banco::prepare($sql);
           $stmt->bindParam(':id',$id,PDO::PARAM_INT);
           return $stmt->execute();
       }

   }
?>