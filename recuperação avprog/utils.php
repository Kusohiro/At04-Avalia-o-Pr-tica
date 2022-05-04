<?php

    require_once("class/Livro.php");
require_once("class/livro_autor.php");
    require_once("class/Venda.php");
require_once("class/Autor.php");
require_once("class/Cliente.php");
require_once("class/item_venda.php");

    function exibir_como_select($key, $dados){
        $str = "<option value=0>Escolha</option>";
        foreach($dados as $linha){
            $str .= "<option value='{$linha[$key[0]]}'>{$linha[$key[1]]}</option>";
        }
        return $str;
    }
	 function lista_cliente($id){
        $cliente = new cliente("", "", "", "", "", "");
        $lista = $cliente->buscar($id);
        foreach($lista as $dados)
            return $dados;
    }
    function lista_livro($id){
        $livro = new Livro("", "", "", "", "", "");
        $lista = $livro->buscar($id);
        foreach($lista as $dados)
            return $dados;
    }
function lista_livro_autor($idLivro, $idAutor){
        $livroAutor = new Livro_autor("", "", "", "");
        $lista = $livroAutor->buscar($idLivro, $idAutor);
        foreach($lista as $dados)
            return $dados;
    }
function lista_item_venda($idLivro, $idVenda){
        $livrovenda = new item_venda("", "", "", "", "", "");
        $lista = $livrovenda->buscar($idLivro, $idVenda);
        foreach($lista as $dados)
            return $dados;
    }

    function lista_venda($id){
		$venda = new Venda("", "", "", "", "");
        $lista = $venda->buscar($id);
        foreach($lista as $dados)
            return $dados;}

  function lista_autor($id){
		 $autor = new Autor("", "", "");
        $lista = $autor->buscar($id);
        foreach($lista as $dados)
            return $dados;}

    function select_cliente($id){
        $venda = new Venda("", "", "", "", "");
        $lista = $venda->buscarCliente();
        return exibir_como_select(array("c_idCliente", "c_nome"), $lista);
    }
function select_autor($id){
        $livro = new Livro("", "", "", "", "", "");
        $lista = $livro->buscarAutor();
        return exibir_como_select(array("a_idAutor", "a_nome"), $lista);
    }
function select_livro($id){
        $livroa = new Livro("", "", "", "", "", "");
        $lista = $livroa->buscarLivro();
        return exibir_como_select(array("l_idLivro", "l_titulo"), $lista);
    }
function select_venda($id){
        $vendaa = new item_venda("", "", "", "", "", "");
        $lista = $vendaa->buscarvenda();
        return exibir_como_select(array("v_idVenda", "v_idVenda"), $lista);
    }
?>