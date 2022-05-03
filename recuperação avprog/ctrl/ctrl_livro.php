<?php
    require_once("../class/Livro.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        $livro = new Livro("", "", "", "", "", "");
        $livro->excluir($id);
        header("location:../index.php");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
        $ano_publicacao = isset($_POST["ano_publicacao"]) ? $_POST["ano_publicacao"] : "";
        $isdn = isset($_POST["isdn"]) ? $_POST["isdn"] : "";
        $preco = isset($_POST["preco"]) ? $_POST["preco"] : 0;
		$autor = isset($_POST["autor"]) ? $_POST["autor"] : 0;
        
        $livro = new Livro(0, $titulo, $ano_publicacao, $isdn, $preco, $autor);
        if($id == 0){
            $livro->insere();
            header("location:../index.php");
        } else{
            $livro->editar($id);
            header("location:../index.php");
        }
    }
?>