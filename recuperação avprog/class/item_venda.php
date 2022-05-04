<?php
    class item_venda{
        private $l_idLivro;
        private $v_idVenda;
		private $antidLivro;
		private $antidVenda;
		private $iv_quantidade;
		private $iv_valor_total_item;
        public function __construct($idLivro, $idVenda,$antLivro, $antVenda, $quant, $valorT){
            $this->setIdLivro($idLivro);
            $this->setidVenda($idVenda);
			$this->setantidVenda($antVenda);
			$this->setantIdLivro($antLivro);
			$this->setquantidade($quant);
			$this->setvalortotal($valorT);
        }

        public function getIdLivro(){ return $this->l_idLivro; }
        public function getidVenda(){ return $this->v_idVenda; }
		public function getidVendaant(){ return $this->antidVenda; }
		public function getIdLivroant(){ return $this->antidLivro; }
		public function getquantidade(){ return $this->iv_quantidade; }
		public function getvalortotal(){ return $this->iv_valor_total_item; }


        public function setIdLivro($idLivro){ $this->l_idLivro = $idLivro; }
        public function setidVenda($idVenda){ $this->v_idVenda = $idVenda; }
		public function setantidVenda($antidVenda){ $this->antidVenda = $antidVenda; }
		public function setantIdLivro($antidLivro){ $this->antiidLivro = $antidLivro; }
		public function setquantidade($quant){ $this->iv_quantidade = $quant; }
		public function setvalortotal($valorT){ $this->iv_valor_total_item = $valorT; }

        public function insere($nvalor, $idVenda){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO item_venda (iv_l_idLivro, iv_v_idVenda, iv_quantidade, iv_valor_total_item) VALUES(:idLivro, :idVenda, :quant, :valort)";
			$this->adcionarItem($nvalor, $idVenda);
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":idLivro", $this->l_idLivro);
            $stmt->bindParam(":idVenda", $this->v_idVenda);
			$stmt->bindParam(":quant", $this->iv_quantidade);
			$stmt->bindParam(":valort", $this->iv_valor_total_item);
            return $stmt->execute();
        }
        public function buscar($idLivro,$idVenda){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM item_venda WHERE iv_l_idLivro = :idLivro and iv_v_idVenda = :idVenda";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":idLivro", $idLivro);
			 $stmt->bindParam(":idVenda", $idVenda);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($idLivro, $idVenda, $nidLivro, $nidVenda){
            require_once("../conf/Conexao.php");
            $query = "UPDATE item_venda
                    SET iv_l_idLivro = :nidLivro, iv_v_idVenda = :nidVenda, iv_quantidade = :quant, iv_valor_total_item = :valort
                    WHERE iv_l_idLivro = :idLivro and iv_v_idVenda = :idVenda";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
						$stmt->bindParam(":nidVenda", $nidVenda);
			$stmt->bindParam(":nidLivro", $nidLivro);
            $stmt->bindParam(":idLivro", $idLivro);
            $stmt->bindParam(":idVenda", $idVenda);
			$stmt->bindParam(":quant", $this->iv_quantidade);
			$stmt->bindParam(":valort", $this->iv_valor_total_item);
            return $stmt->execute();
        }
        public function excluir($idLivro,$idVenda){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM item_venda WHERE iv_l_idLivro = :idLivro and iv_v_idVenda = :idVenda";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":idLivro", $idLivro);
			$stmt->bindParam(":idVenda", $idVenda);
            return $stmt->execute();
        }
		      public function buscarVenda(){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM Venda";
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
		public function adcionarItem($nvalor, $idVenda){
			require_once("../conf/Conexao.php");
            $query = "UPDATE venda
                    SET v_valor_total_venda = :valort
                    WHERE v_idVenda = :idVenda";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
			$stmt->bindParam(":valort", $nvalor);
			$stmt->bindParam(":idVenda", $idVenda);
            return $stmt->execute();
		}
    }
?>