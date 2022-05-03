<?php
    require_once("../class/Autor.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        $Autor = new Autor("", "", "", "", "");
        $Autor->excluir($id);
        header("location:../index.php");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $sobrenome = isset($_POST["sobrenome"]) ? $_POST["sobrenome"] : "";
        
        $Autor = new Autor(0, $nome, $sobrenome);
        if($id == 0){
            $Autor->insere();
            header("location:../index.php");
        } else{
            $Autor->editar($id);
            header("location:../index.php");
        }
    }
?>