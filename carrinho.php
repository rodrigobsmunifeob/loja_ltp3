<?php include("header.php");

    // PROCESSA AÇÕES DO CARRINHO

    if (isset($_REQUEST['acao'])) {

        $acao = $_REQUEST['acao'];

        if ($acao == 'remover') {

            unset($_SESSION['carrinho'][$_REQUEST['id']]);

        }


        if ($acao == 'adicionar') {

            $produto = mysqli_query($conexao, "SELECT * FROM produtos WHERE id_produto = ".$_REQUEST['id']);
            $produto = mysqli_fetch_array($produto);

            $id = $produto['id_produto'];

            $_SESSION["carrinho"][$id] = array(
                "foto" => "assets/produtos/".$id.".png",
                "nome" => $produto['nome'],
                "qnt" => $_REQUEST['qnt'],
                "preco" => $produto['preco']
            );

        }

    }


?>



    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Carrinho de Compra</div>
        <div class="panel-body">
            <p></p>
        </div>

        <div class="container" style="overflow: hidden; padding-bottom: 20px;">

            <?php if (isset($_REQUEST['acao']) && $_REQUEST['acao']=='remover') { ?>
            <div class="alert alert-success" role="alert">Produto removido do carrinho com sucesso.</div>
            <?php } ?>


            <?php if (isset($_REQUEST['acao']) && $_REQUEST['acao']=='adicionar') { ?>
                <div class="alert alert-success" role="alert">Produto adicionado ao carrinho com sucesso.</div>
            <?php } ?>


            <!-- Table -->
            <table class="table">

                <h3>Carrinho de Compras</h3>
                <hr>

                <thead>

                <tr>

                    <th width="1">Foto</th>

                    <th width="244">Produto</th>

                    <th width="79">Quantidade</th>

                    <th width="89">Pre&ccedil;o</th>

                    <th width="100">SubTotal</th>

                    <th width="1">Remover</th>

                </tr>

                </thead>

                <tbody>

                <?php

                if (isset($_SESSION['carrinho'])) {

                    $total_pedido = 0;
                    foreach ($_SESSION['carrinho'] as $id => $produto) {
                        $total_pedido += $produto['preco'] * $produto['qnt'];
                    ?>

                    <tr>
                        <td>
                            <div class="thumbnail">
                                <img style="max-height: 150px; width: 150px !important;" src="assets/produtos/<?php echo $id ?>.png">
                            </div>
                        </td>

                        <td>
                            <?php echo $produto["nome"]; ?>
                        </td>
                        <td>
                            <?php echo $produto['qnt']; ?>
                        </td>
                        <td>
                            R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                        </td>
                        <td>
                            R$ <?php echo number_format($produto['preco'] * $produto['qnt'], 2, ',', '.'); ?>
                        </td>
                        <td>
                            <a onclick="return confirm('Tem certeza de que deseja excluir?');" href="carrinho.php?acao=remover&id=<?php echo $id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                        </td'>
                    </tr>

                    <?php } ?>

                    <!-- TOTAL -->

                    <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <p align="right"><b>Total Pedido</b></p>
                        </td>
                        <td>
                            <b>R$ <?php echo number_format($total_pedido, 2, ',', '.'); ?></b>
                        </td>
                        <td>
                        </td>
                    </tr>


                <?php } else { ?>

                    <tr>
                        <td colspan="6" align="center">Carrinho vazio.</td>
                    </tr>


                <?php } ?>


                </tbody>

            </table>

            <?php

            if (isset($_SESSION['carrinho'])) {

                ?>
                <a href="finalizar.php" class="btn btn-success pull-right btn-lg"><i
                            class="glyphicon glyphicon-shopping-cart"></i> Finalizar Compra</a>
            <?php } ?>


        </div>

    </div>

<?php include("footer.php"); ?>