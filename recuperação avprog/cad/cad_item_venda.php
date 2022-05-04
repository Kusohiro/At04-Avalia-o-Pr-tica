<!DOCTYPE html>
<?php
    require_once("../utils.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
 $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $idLivro = isset($_GET["livro"]) ? $_GET["livro"] : 0;
	$idvenda = isset($_GET["venda"]) ? $_GET["venda"] : 0;
    if($id > 0){
        $vetor = lista_item_venda($idLivro, $idvenda);
    }

    $title = "Cadastro de Item e Venda";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <a href="../indexitemvenda.php">Voltar à página principal</a> |
    <?php echo $title; ?><br>
    <br>
    <form action="../ctrl/ctrl_item_venda.php?id=<?php echo $id; ?>&livro=<?php echo $idLivro; ?>&venda=<?php echo $idvenda; ?>" method="post">
		Livro: <select name="idLivron">
                    <?php
                        echo select_livro(0);
                    ?>
                </select><br>
		venda: <select name="idvendan">
                    <?php
                        echo select_venda(0);
                    ?>
                </select><br>
		quantidade: <input type="number" name="quant" value="<?php if($acao == "editar") echo $vetor[2]; ?>"> <br><br>
		Preço: R$<input type="text" name="preco" value="<?php if($acao == "editar") echo $vetor[3]; ?>"><br>
        <br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
    </form>
</body>
</html>