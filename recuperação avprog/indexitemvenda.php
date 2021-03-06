<!doctype html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>tabela item e venda</title>
<link href="BlogPostAssets/styles/blogPostStyle.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<div id="mainwrapper">
  <header> 
    <!--**************************************************************************
    Header starts here. It contains Logo and 3 navigation links. 
    ****************************************************************************-->
    <div id="logo"><img src="BlogPostAssets/images/logoImage.png.png"logoImage.png"" alt="sample logo"><!-- Company Logo text --></div>
    <nav> <a href="cad/cad_livro.php">Cadastro de livro</a> <a href="cad/cad_venda.php">Cadastro de venda</a><a href="cad/cad_autor.php">Cadastro de autor</a> <a href="cad/cad_livro_autor.php">Cadastro de livro e autor</a> <a href="cad/cad_cliente.php">Cadastro de cliente</a> <a href="cad/cad_item_venda.php">Cadastro de item e venda</a> </nav>
  </header>
  <div id="content">
    <div class="notOnDesktop"> 
      <!-- This search box is displayed only in mobile and tablet laouts and not in desktop layouts -->
      <input type="text" placeholder="Search">
    </div>
    <section id="mainContent"> 
      <!--************************************************************************
    Main Blog content starts here
    ****************************************************************************-->
      <h1><!-- Blog title -->item e venda</h1>
      <div id="bannerImage"><img src="BlogPostAssets/images/160e6a310003bee0545da7e36d27cfa8--anime-scenery-horror-film.jpg" alt=""/></div>
		<br>
      <table border="1">
    <tr>
        <th>Venda (ID)</th>
        <th>Venda (Valor total com desconto)</th>
        <th>Venda (Desconto)</th>
        <th>Livro (ID)</th>
        <th>Livro (T??tulo)</th>
        <th>Quantidade</th>
        <th>Item (Valor total)</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
	$idm = 1;
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT *
                                FROM Venda JOIN Item_venda ON iv_v_idVenda = v_idVenda JOIN
                                    Livro ON iv_l_idLivro = l_idLivro
                                ORDER BY v_valor_total_venda");
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
    ?>
    <tr>
        <td><?php echo $linha["v_idVenda"]; ?></td>
        <td><?php echo "R$ ".number_format($linha["v_valor_total_venda"], 2, ",", "."); ?></td>
        <td><?php echo number_format($linha["v_desconto"], 2, ",", ".")."%"; ?>
        <td><?php echo $linha["l_idLivro"]; ?></td>
        <td><?php echo $linha["l_titulo"]; ?></td>
        <td><?php echo $linha["iv_quantidade"]; ?></td>
        <td><?php echo "R$ ".number_format($linha["iv_valor_total_item"], 2, ",", "."); ?></td>
        <td><a href="cad/cad_item_venda.php?acao=editar&id=<?php echo $idm; ?>&venda=<?php echo $linha['v_idVenda'];?>&livro=<?php echo $linha["l_idLivro"]; ?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('ctrl/ctrl_item_venda.php?acao=excluir&venda=<?php echo $linha['v_idVenda']; ?>&livro=<?php echo $linha['l_idLivro']; ?>')">Excluir</a><br></td>
    </tr>
    <?php 
			 $idm ++;
        }
    ?>
</table>
      <aside id="authorInfo" align="center"> 
        <!-- The author information is contained here -->
        <h2>Jo??o Vitor Oliveira de Souza</h2>
      <img id="melodia" src="BlogPostAssets/images/commission_by_jirafuru_de6glls-350t.png" width="633" height="350" alt=""/>
		<br><br></aside>
		<br>
    </section>
    <section id="sidebar"> 
      <!--************************************************************************
    Sidebar starts here. It contains a searchbox, sample ad image and 6 links
    ****************************************************************************-->
      <div id="adimage"><img src="BlogPostAssets/images/images (1).jpg" alt=""/></div>
      <nav>
        <ul>
           <li><a href="indexautor.php" title="Link">Autor</a></li>
          <li><a href="indexvenda.php" title="Link">Venda</a></li>
          <li><a href="indexlivro.php" title="Link">Livro</a></li>
          <li><a href="indexcliente.php" title="Link">Cliente</a></li>
          <li><a href="indexitemvenda.php" title="Link">Item e Venda</a></li>
          <li><a href="indexlivroautor.php" title="Link">Livro e Autor</a></li>
        </ul>
      </nav>
    </section>
  </div>
  <div id="footerbar"><!-- Small footerbar at the bottom --></div>
</div>
</body>
</html>
<script>
    function excluirRegistro(url){
        if(confirm("Este registro ser?? exclu??do. Tem certeza?"))
            location.href = url;
    }
</script>