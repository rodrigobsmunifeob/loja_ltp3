<?php include("header.php"); ?>

    <div class="container" style="margin-top: 30px;">

        <div class="row" style="clear:both">

            <?php include("menu_cliente.php"); ?>

            <div class="col-sm-12 col-md-10 img-rounded" style="min-height: 400px; background: #fff;">

                <h4>Início</h4>
                <hr>

                <div class="row">

                    <?php

                        $pedido = mysqli_fetch_array(mysqli_query($conexao, "SELECT * FROM pedidos WHERE id_cliente = ".$_SESSION["id_cliente"]." ORDER BY id_pedido DESC LIMIT 1;"));

                    ?>
                    <h2>Obrigado pela compra.</h2>
					<h5>Assim que identificado pagamento, seu pedido sera atualizado automativamente</h5><br>
                    <div class="col-sm-6 col-md-6">
                        <button class="btn btn-success btn-lg" type="button">
                            Útimo Pedido: <span class="badge">CÓDIGO <?php echo $pedido["id_pedido"]; ?></span>
                        </button>
                        <p>Data: <?php echo date("d/m/Y \à\s H:i:s", strtotime($pedido["data"])); ?></p>
                    </div>
                    <div class="col-sm-6 col-md-6">

                    </div>

            </div>

    </div>

<?php include("footer.php"); ?>


