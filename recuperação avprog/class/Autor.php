<?php
    class Autor{
        private $a_idAutor;
        private $a_nome;
        private $a_sobrenome;

        public function __construct($idAutor, $Nome, $Sobrenome){
            $this->setId($idAutor);
            $this->setNome($Nome);
            $this->setSobrenome($Sobrenome);
        }

        public function getId(){ return $this->a_idAutor; }
        public function getNome(){ return $this->a_nome; }
        public function getSobrenome(){ return $this->a_sobrenome; }
		
        public function setId($idAutor){ $this->a_idAutor = $idAutor; }
        public function setNome($Nome){ $this->a_nome = $Nome; }
        public function setSobrenome($Sobrenome){ $this->a_sobrenome = $Sobrenome; }

        public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO Autor (a_idAutor, a_nome, a_sobrenome) VALUES (:id, :Nome, :Sobrenome)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $this->a_idAutor);
            $stmt->bindParam(":Nome", $this->a_nome);
            $stmt->bindParam(":Sobrenome", $this->a_sobrenome);
            return $stmt->execute();
        }
        public function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Autor WHERE a_idAutor = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($id){
            require_once("../conf/Conexao.php");
            $query = "UPDATE Autor
                    SET a_nome = :Nome, a_sobrenome = :Sobrenome
                    WHERE a_idAutor = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":Nome", $this->a_nome);
            $stmt->bindParam(":Sobrenome", $this->a_sobrenome);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        public function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM Autor WHERE a_idAutor = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    }
?>