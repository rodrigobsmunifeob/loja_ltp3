<?php include("header.php"); ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Carrinho de Compra</div>
        <div class="panel-body">
            <p></p>
        </div>

        <div class="container">

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

                    foreach ($_SESSION['carrinho'] as $id => $produto) {

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
                            1
                        </td>
                        <td>
                            R$ 1,00
                        </td>
                        <td>
                            R$ 1,00
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
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
                            <b>R$ 1,00</b>
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