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
<!-- Table -->
        <?php
        $id_pedido = $_GET['id'];
        $sql = "SELECT * FROM pedidos WHERE id_pedido = $id_pedido;";
        $prod = mysqli_fetch_array(mysqli_query($conexao,$sql));
         ?>
            <h3>Detalhes de Pedidos</h3>
            <hr>
            <table class="table">
                <tr><td><b>ID Pedido :</b></td><td><b><?php echo  isset($prod["id_pedido"])? $prod["id_pedido"] : "id";  ?></b></td></tr>
                <tr><td> Data do Pedido :  </td><td><?php echo  isset($prod["data"])? date("d/m/Y \à\s H:i:s", strtotime($prod["data"])) : "data";  ?></td></tr>
                <tr><td> Status Pedido :  </td><td><?php echo  isset($prod["status"])? $prod["status"] : "status";  ?></td></tr>
                <tr><td> Sub Total :  </td><td>R$ <?php echo  isset($prod["total_pedido"])? number_format($prod["total_pedido"], 2, ',', '.') : "subtotal";  ?></td></tr>
            </table>

    <table class="table">
        <h3>Produtos do pedido</h3>
        <hr
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
        $sql = "SELECT pedidos_tem_produtos.produtos_id_produto as id_produto,produtos.nome, pedidos_tem_produtos.qnt, produtos.preco,pedidos_tem_produtos.subtotal, pedidos.total_pedido
                FROM produtos  
                INNER JOIN pedidos_tem_produtos
                INNER JOIN pedidos 
                ON pedidos_tem_produtos.produtos_id_produto = produtos.id_produto AND pedidos_tem_produtos.pedidos_id_pedido = pedidos.id_pedido 
                WHERE id_pedido = $id_pedido;";
        $pro = mysqli_query($conexao,$sql);
            foreach ($pro as $produto) {?>
                <tr>
                    <td>
                        <div class="thumbnail">
                            <img style="max-height: 150px; width: 150px !important;" src="assets/produtos/<?php echo $produto['id_produto'] ?>.png">
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
            <!-- TOTAL -->
            <tr>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                    <p align="right" ><b>Total Pedido</b></p>
                </td>
                <td>
                    <b style="color: #3e8f3e">R$ <?php echo  isset($prod["total_pedido"])? number_format($prod["total_pedido"], 2, ',', '.') : "subtotal";  ?></b>
                </td>
                <td>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
<?php include 'footer.php'; ?>