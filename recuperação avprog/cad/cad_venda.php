<!DOCTYPE html>
<?php
    require_once("../utils.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    if($id > 0){
        $vetor = lista_venda($id);
    }

    $title = "Cadastro de Venda";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <a href="../indexvenda.php">Voltar à página principal</a> |
    <?php echo $title; ?><br>
    <br>
    <form action="../ctrl/ctrl_venda.php?id=<?php echo $id; ?>" method="post">
        Valor total: R$<input type="text" name="valor_total" value="<?php if($acao == "salvar") echo $vetor[1]; ?>"><br>
        <br>
        Desconto: <input type="text" name="desconto" value="<?php if($acao == "salvar") echo $vetor[2]; ?>">%<br>
        <br>
        Cliente: <select name="cliente">
                    <?php
                        echo select_cliente(0);
                    ?>
                </select><br>
        <br>
		Data venda<input type="date" name="data_venda" value="<?php if($acao == "salvar") echo $vetor[3]; ?>"><br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
    </form>
</body>
</html>