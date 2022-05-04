<?php
    class Cliente{
        private $c_idCliente;
        private $c_nome;
        private $c_cpf;
		private $c_dt_nascimento;

        public function __construct($idcliente, $Nome, $CPF, $nasc){
            $this->setId($idcliente);
            $this->setNome($Nome);
            $this->setCPF($CPF);
			$this->setnasc($nasc);
        }

        public function getId(){ return $this->c_idCliente; }
        public function getNome(){ return $this->c_nome; }
        public function getCPF(){ return $this->c_cpf; }
		public function getnasc(){ return $this->c_dt_nascimento; }
		
        public function setId($idcliente){ $this->c_idCliente = $idcliente; }
        public function setNome($Nome){ $this->c_nome = $Nome; }
        public function setCPF($CPF){ $this->c_cpf = $CPF; }
		public function setnasc($nasc){ $this->c_dt_nascimento = $nasc; }

        public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO Cliente (c_idCliente, c_nome, c_cpf, c_dt_nascimento) VALUES (:id, :Nome, :CPF, :nasc)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $this->c_idCliente);
            $stmt->bindParam(":Nome", $this->c_nome);
            $stmt->bindParam(":CPF", $this->c_cpf);
			$stmt->bindParam(":nasc", $this->c_dt_nascimento);
            return $stmt->execute();
        }
        public function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Cliente WHERE c_idCliente = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($id){
            require_once("../conf/Conexao.php");
            $query = "UPDATE Cliente
                    SET c_nome = :Nome, c_cpf = :CPF, c_dt_nascimento = :nasc
                    WHERE c_idCliente = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":Nome", $this->c_nome);
            $stmt->bindParam(":CPF", $this->c_cpf);
			$stmt->bindParam(":nasc", $this->c_dt_nascimento);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        public function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM Cliente WHERE c_idCliente = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    }
?>