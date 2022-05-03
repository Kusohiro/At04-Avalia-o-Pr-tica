<?php
    require_once("../class/livro_autor.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idLivro = isset($_POST["livro"]) ? $_POST["livro"] : 0;
	$idAutor = isset($_POST["autor"]) ? $_POST["autor"] : 0;

    if($acao == "excluir"){
        $livro = new Livro_autor("", "");
        $livro->excluir($idLivro, $idAutor);
        header("location:../index.php");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        
        $livroAutor = new Livro_autor(0, 0);
        if($idLivro){
            $livroAutor->insere();
            header("location:../index.php");
        } else{
            $livroAutor->editar($idLivro, $idAutor);
            header("location:../index.php");
        }
    }
?>