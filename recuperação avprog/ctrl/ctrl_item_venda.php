<?php
    require_once("../class/item_venda.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idLivro = isset($_GET["livro"]) ? $_GET["livro"] : 0;
	$idvenda = isset($_GET["venda"]) ? $_GET["venda"] : 0;
 $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        $livro = new item_venda("", "", "", "", "", "");
        $livro->excluir($idLivro, $idvenda);
        header("location:../indexitemvenda.php");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
         $idLivron = isset($_POST["idLivron"]) ? $_POST["idLivron"] : 0;
        $idvendan = isset($_POST["idvendan"]) ? $_POST["idvendan"] : 0;
		$quant = isset($_POST["quant"]) ? $_POST["quant"] : 0;
        $preco = isset($_POST["preco"]) ? $_POST["preco"] : 0;
        $itemvenda = new item_venda($idLivron, $idvendan, $idLivro, $idvenda, $quant, $preco);
        if($idLivro == 0){
            $itemvenda->insere($preco, $idvendan);
            header("location:../indexitemvenda.php");
        } else{
            $itemvenda->editar($idLivro, $idvenda, $idLivron, $idvendan);
            header("location:../indexitemvenda.php");
        }
    }
?>