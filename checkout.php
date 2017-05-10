<?php 

	include("header.php");

?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">Confirmar Compra</div>
	<div class="panel-body">
		<p></p>
	</div>
	<div class="container">

		<div class="row">

			<div class="col-md-12">
				<div class="thumbnail" style="min-height: 300px; overflow: hidden; padding-bottom: 20px;">
					<div class="caption">
						<h3>Confirmar Compra</h3>
						<p>Confirme o seu pedido abaixo. Após confirmação, você será redirecionado para o PagSeguro para realizar o pagamento.</p>
						<hr>
						<table class="table">

                <thead>

                <tr>

                    <th width="1">Foto</th>

                    <th width="244">Produto</th>

                    <th width="79">Quantidade</th>

                    <th width="89">Pre&ccedil;o</th>

                    <th width="100">SubTotal</th>
                </tr>

                </thead>

                <tbody>

                <?php

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
                    </tr>

                    <?php } ?>

                    <!-- TOTAL -->

                    <tr>
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
                    </tbody>
                    </table>
						<hr>
						<br>
						<a class="btn btn-primary pull-left" href="carrinho.php">Voltar ao Carrinho</a>
						<a class="btn btn-success pull-right" href="salvar.php">Confirmar Compra</a>
					</div>
				</div>
			</div>

		

		</div>

	</div>

</div>

<?php include("footer.php"); ?>