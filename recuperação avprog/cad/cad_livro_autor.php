<!DOCTYPE html>
<?php
    require_once("../utils.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idLivro = isset($_GET["livro"]) ? $_GET["livro"] : 0;
	$idAutor = isset($_GET["autor"]) ? $_GET["autor"] : 0;
    if($idLivro > 0 && $idAutor > 0){
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
    <a href="../index.php">Voltar à página principal</a> |
    <?php echo $title; ?><br>
    <br>
    <form action="../ctrl/ctrl_livro_autor.php" method="post">
		Livro: <select name="livro">
                    <?php
                        echo select_livro(0);
                    ?>
                </select><br>
		Autor: <select name="autor">
                    <?php
                        echo select_autor(0);
                    ?>
                </select><br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
    </form>
</body>
</html>