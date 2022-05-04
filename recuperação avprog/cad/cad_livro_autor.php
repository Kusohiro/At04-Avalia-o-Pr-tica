<!DOCTYPE html>
<?php
    require_once("../utils.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
 $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $idLivro = isset($_GET["livro"]) ? $_GET["livro"] : 0;
	$idAutor = isset($_GET["autor"]) ? $_GET["autor"] : 0;
    if($id > 0){
        $vetor = lista_livro_autor($idLivro, $idAutor);
    }

    $title = "Cadastro de Livro e Autor";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <a href="../indexlivroautor.php">Voltar à página principal</a> |
    <?php echo $title; ?><br>
    <br>
    <form action="../ctrl/ctrl_livro_autor.php?id=<?php echo $id; ?>&livro=<?php echo $idLivro; ?>&autor=<?php echo $idAutor; ?>" method="post">
		Livro: <select name="idLivron">
                    <?php
                        echo select_livro(0);
                    ?>
                </select><br>
		Autor: <select name="idAutorn">
                    <?php
                        echo select_autor(0);
                    ?>
                </select><br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
    </form>
</body>
</html>