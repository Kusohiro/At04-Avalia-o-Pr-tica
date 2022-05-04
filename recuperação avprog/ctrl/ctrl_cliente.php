<?php
    require_once("../class/Cliente.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        $Cliente = new Cliente("", "", "", "");
        $Cliente->excluir($id);
        header("location:../indexcliente.php");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";
		$nasc = isset($_POST["nasc"]) ? $_POST["nasc"] : "";
        
		
        $Cliente = new Cliente(0, $nome, $cpf, $nasc);
        if($id == 0){
            $Cliente->insere();
            header("location:../indexcliente.php");
        } else{
            $Cliente->editar($id);
            header("location:../indexcliente.php");
        }
    }
?>