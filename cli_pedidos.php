<?php include("header.php"); ?>

    <div class="container" style="margin-top: 30px;">

        <div class="row" style="clear:both">

            <?php include("menu_cliente.php"); ?>

            <div class="col-sm-12 col-md-10 img-rounded" style="min-height: 400px; background: #fff;">

                <h4>Meus Pedidos</h4>
                <hr>

                <table class="table">

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
                                <a href="pedido.php?id=<?php echo $pedido["id_pedido"]; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-eye-open"></i></a>
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


            </div>
                
    </div>

<?php include("footer.php"); ?>


