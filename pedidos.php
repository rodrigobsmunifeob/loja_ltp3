<?php include("header.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>



    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Meus Pedidos</div>
        <div class="panel-body">
            <p></p>
        </div>

        <div class="container" style="overflow: hidden; padding-bottom: 20px;">


            <!-- Table -->
            <table class="table">

                <h3>Meus Pedidos</h3>
                <hr>

                <thead>

                <tr>

                    <th width="1">ID</th>

                    <th width="100">Data</th>

                    <th width="230">Status</th>

                    <th width="89">Total</th>

                    <th width="1">Visualizar</th>

                </tr>

                </thead>

                <tbody>

                <?php

                    $pedidos = mysqli_query($conexao, "SELECT * FROM pedidos WHERE id_cliente = ".$_SESSION["id_cliente"]." ORDER BY id_pedido DESC");
                    while ($pedido = mysqli_fetch_array($pedidos)):
                    ?>

                    <tr>
                        <td>
                               <?php echo $pedido["id_pedido"] ?>
                        </td>

                        <td>
                            <?php echo date("d/m/Y H:i:s", strtotime($pedido["data"])); ?>
                        </td>
                        <td>
                            <?php echo $pedido['status']; ?>
                        </td>
                        <td>
                            R$ <?php echo number_format($pedido['total_pedido'], 2, ",", "."); ?>
                        </td>
                        <td>
                            <a href="cli_detalhe_pedido.php?id=<?php echo $pedido["id_pedido"]; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-eye-open"></i></a>
                        </td'>
                    </tr>
                  <?php endwhile; ?>

                <?php if (mysqli_num_rows($pedidos)==0): ?>
                    <tr>
                        <td colspan="6" align="center">Não ha Pedidos.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <?php /*
            if (isset($_SESSION['carrinho'])) {
                ?>
                <a href="finalizar.php" class="btn btn-success pull-right btn-lg"><i
                            class="glyphicon glyphicon-shopping-cart"></i> Finalizar Compra</a>
            <?php } */ ?>
        </div>
    </div>
<?php include("footer.php"); ?>
