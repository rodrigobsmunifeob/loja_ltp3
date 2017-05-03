<?php include("header.php"); ?>

    <div class="container" style="margin-top: 30px;">

        <div class="row" style="clear:both">

            <div class="col-sm-12 col-md-2">

                <h4>Busca</h4>
                <hr>
                <form action="categorias.php" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="O que busca?" name="palavra" value="<?php if (isset($_POST['palavra'])) echo $_POST['palavra']; ?>">
                        <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">OK</button>
                  </span>
                    </div><!-- /input-group -->
                </form>
                <br>
                <h4>Categorias</h4>
                <hr>

                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="categorias.php?id=1">Computadores</a></li>
                    <li class="active"><a href="categorias.php?id=2">Celulares</a></li>
                    <li class="active"><a href="categorias.php?id=3">Televisores</a></li>
                    <li class="active"><a href="categorias.php?id=4">Eletrodomésticos</a></li>
                    <li class="active"><a href="categorias.php?id=5">Decoração</a></li>
                </ul>
            </div>

            <div class="col-sm-12 col-md-10">
                <h4>Produtos</h4>
                <hr>

                <?php

                if (isset($_POST['palavra'])) {
                    $produtos = mysqli_query($conexao, "SELECT * FROM produtos WHERE nome LIKE '%".$_POST['palavra']."%' ORDER BY RAND() LIMIT 4;");
                } else {
                    $produtos = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY RAND() LIMIT 4;");
                }

                while ( $produto = mysqli_fetch_array ( $produtos ) ) :
                    ?>

                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="assets/produtos/<?php echo $produto['id_produto']; ?>.png">
                            <div class="caption">
                                <h3 class="titulo"><?php echo substr($produto['nome'], 0, 30); ?>...</h3>
                                <p class="preco">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                                <p style="clear: both;">
                                    <a href="produto.php?id=<?php echo $produto['id_produto']; ?>"
                                       class="btn btn-primary btn-danger" role="button">
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                        Comprar</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- PAGINADOR -->

                <nav aria-label="Page navigation clearfix" style="clear: both;">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                        <li><a href="#">10</a></li>
                        <li><a href="#">11</a></li>
                        <li><a href="#">12</a></li>

                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>

    </div>

<?php include("footer.php"); ?>