<?php
    require_once("../class/livro_autor.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idLivro = isset($_GET["livro"]) ? $_GET["livro"] : 0;
	$idAutor = isset($_GET["autor"]) ? $_GET["autor"] : 0;
 $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        $livro = new Livro_autor("", "");
        $livro->excluir($idLivro, $idAutor);
        header("location:../indexlivroautor.php");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
         $idLivron = isset($_POST["idLivron"]) ? $_POST["idLivron"] : 0;
        $idAutorn = isset($_POST["idAutorn"]) ? $_POST["idAutorn"] : 0;
        $livroAutor = new Livro_autor($idLivron, $idAutorn, $idLivro, $idAutor);
        if($idLivro == 0){
            $livroAutor->insere();
            header("location:../indexlivroautor.php");
        } else{
            $livroAutor->editar($idLivro, $idAutor, $idLivron, $idAutorn);
            header("location:../indexlivroautor.php");
        }
    }
?>