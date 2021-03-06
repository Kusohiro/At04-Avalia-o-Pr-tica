<?php
    class Livro{
        private $l_idLivro;
        private $l_titulo;
        private $l_ano_publicacao;
        private $l_isdn;
        private $l_preco;
		private $l_a_autor;
        public function __construct($idLivro, $titulo, $ano_publicacao, $isdn, $preco, $autor){
            $this->setId($idLivro);
            $this->setTitulo($titulo);
            $this->setAnoPublicacao($ano_publicacao);
            $this->setIsdn($isdn);
            $this->setPreco($preco);
			$this->setAutor($autor);
        }

        public function getId(){ return $this->l_idLivro; }
        public function getTitulo(){ return $this->l_titulo; }
        public function getAnoPublicacao(){ return $this->l_ano_publicacao; }
        public function getIsdn(){ return $this->l_isdn; }
        public function getPreco(){ return $this->l_preco; }
		 public function getAutor(){ return $this->l_a_autor; }

        public function setId($idLivro){ $this->l_idLivro = $idLivro; }
        public function setTitulo($titulo){ $this->l_titulo = $titulo; }
        public function setAnoPublicacao($ano_publicacao){ $this->l_ano_publicacao = $ano_publicacao; }
        public function setIsdn($isdn){ $this->l_isdn = $isdn; }
        public function setPreco($preco){ $this->l_preco = $preco; }
		public function setAutor($autor){ $this->l_a_autor = $autor; }

        public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO livro (l_idLivro, l_titulo, l_ano_publicacao, l_isdn, l_preco) VALUES(:id, :titulo, :ano_publicacao, :isdn, :preco)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $this->l_idLivro);
            $stmt->bindParam(":titulo", $this->l_titulo);
            $stmt->bindParam(":ano_publicacao", $this->l_ano_publicacao);
            $stmt->bindParam(":isdn", $this->l_isdn);
            $stmt->bindParam(":preco", $this->l_preco);
            return $stmt->execute();
        }
        public function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Livro WHERE l_idLivro = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($id){
            require_once("../conf/Conexao.php");
            $query = "UPDATE Livro
                    SET l_titulo = :titulo, l_ano_publicacao = :ano_publicacao, l_isdn = :isdn, l_preco = :preco
                    WHERE l_idLivro = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":titulo", $this->l_titulo);
            $stmt->bindParam(":ano_publicacao", $this->l_ano_publicacao);
            $stmt->bindParam(":isdn", $this->l_isdn);
            $stmt->bindParam(":preco", $this->l_preco);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        public function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM Livro WHERE l_idLivro = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
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