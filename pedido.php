<?php
/**
 * Created by PhpStorm.
 * User: WLF
 * Date: 16/05/17
 * Time: 20:34
 */
include 'header.php';

?>


<div class="panel panel-default">
        <!-- Default panel contents -->
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
        <?php
        $id_pedido = $_GET['id'];
        $sql = "SELECT * FROM pedidos_tem_produtos INNER JOIN produtos ON produtos.id_produto = pedidos_tem_produtos.produtos_id_produto;";
        $produto = mysqli_query($conexao,$sql);
        foreach ($produto as $prod){
         ?>
            <h3>Detalhes de Pedidos</h3>
            <hr>

            <table class="table">
                <tr><td> ID Pedido :  </td><td><?php echo  isset($prod["nome"])? $prod["nome"] : "nome";  ?></td></tr>
                <tr><td> Data do Pedido :  </td><td><?php echo  isset($prod["nome"])? $prod["nome"] : "nome";  ?></td></tr>
                <tr><td> Status Pedido :  </td><td><?php echo  isset($prod["nome"])? $prod["nome"] : "nome";  ?></td></tr>
                <tr><td> Sub Total :  </td><td><?php echo  isset($prod["nome"])? $prod["nome"] : "nome";  ?></td></tr>
            </table>
        <?php } ?>

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

            <th width="1"></th>

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

<?php } ?>


</div>

</div>

<? include 'footer.php';
?>

