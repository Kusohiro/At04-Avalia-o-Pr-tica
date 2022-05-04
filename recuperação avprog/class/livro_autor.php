<?php
    class Livro_autor{
        private $l_idLivro;
        private $a_idAutor;
		private $antidLivro;
		private $antidAutor;
        public function __construct($idLivro, $idAutor,$antLivro, $antAutor){
            $this->setIdLivro($idLivro);
            $this->setIdAutor($idAutor);
			$this->setantIdAutor($antAutor);
			$this->setantIdLivro($antLivro);
        }

        public function getIdLivro(){ return $this->l_idLivro; }
        public function getIdAutor(){ return $this->a_idAutor; }
		public function getIdAutorant(){ return $this->antidAutor; }
		public function getIdLivroant(){ return $this->antidLivro; }


        public function setIdLivro($idLivro){ $this->l_idLivro = $idLivro; }
        public function setIdAutor($idAutor){ $this->a_idAutor = $idAutor; }
		public function setantIdAutor($antidAutor){ $this->antidAutor = $antidAutor; }
		public function setantIdLivro($antidLivro){ $this->antiidLivro = $antidLivro; }

        public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO livro_autor (la_l_idLivro, la_a_idAutor) VALUES(:idLivro, :idAutor)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":idLivro", $this->l_idLivro);
            $stmt->bindParam(":idAutor", $this->a_idAutor);
            return $stmt->execute();
        }
        public function buscar($idLivro,$idAutor){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Livro_autor WHERE la_l_idLivro = :idLivro and la_a_idAutor = :idAutor";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":idLivro", $idLivro);
			 $stmt->bindParam(":idAutor", $idAutor);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($idLivro, $idAutor, $nidLivro, $nidAutor){
            require_once("../conf/Conexao.php");
            $query = "UPDATE Livro_autor
                    SET la_l_idLivro = :nidLivro, la_a_idAutor = :nidAutor
                    WHERE la_l_idLivro = :idLivro and la_a_idAutor = :idAutor";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
						$stmt->bindParam(":nidAutor", $nidAutor);
			$stmt->bindParam(":nidLivro", $nidLivro);
            $stmt->bindParam(":idLivro", $idLivro);
            $stmt->bindParam(":idAutor", $idAutor);
            return $stmt->execute();
        }
        public function excluir($idLivro,$idAutor){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM Livro_autor WHERE la_l_idLivro = :idLivro and la_a_idAutor = :idAutor";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":idLivro", $idLivro);
			$stmt->bindParam(":idAutor", $idAutor);
            return $stmt->execute();
        }
		      public function buscarAutor(){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Autor";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
		 public function buscarLivro(){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Livro";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
    }
?>