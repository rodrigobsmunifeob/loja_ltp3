<?php include("header.php"); ?>

    <div class="container" style="margin-top: 30px;">

        <div class="row" style="clear:both">

            <div class="col-sm-12 col-md-2">

                <h4>Busca</h4>
                <hr>
                <form action="categorias.php" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="O que busca?" name="palavra" value="<?php if (isset($_GET['palavra'])) echo $_GET['palavra']; ?>">
                        <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">OK</button>
                  </span>
                    </div><!-- /input-group -->
                </form>
                <br>

                <h4>Categorias</h4>
                <hr>

                <ul class="nav nav-pills nav-stacked">
                    <?php
                        $c = mysqli_query($conexao, "SELECT * FROM categorias ORDER BY categoria");
                        while ($cat = mysqli_fetch_array($c)):
                    ?>
                    <li <?php if (isset($_GET['id']) && $cat['id_categoria'] == $_GET['id']) echo 'class="active"'; ?>><a href="categorias.php?id=<?php echo $cat['id_categoria'] ?>"><?php echo $cat['categoria'] ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div class="col-sm-12 col-md-10">
                <h4>Produtos</h4>
                <hr>

                <?php

                if (isset($_GET['palavra'])) {
                    $sql = "SELECT * FROM produtos WHERE nome LIKE '%" .$_GET['palavra']. "%' ORDER BY preco";
                }
                else if (isset($_GET['id'])){ //else if para selecionar por id ao apertar o botão
                    $sql = "SELECT * FROM produtos WHERE id_categoria = ".$_GET['id']." ORDER BY preco";
                } else {
                    $sql = "SELECT * FROM produtos ORDER BY preco ";
                }

                // CODIGO DE PAGINACAO DOS RESULTADOS
                $produtos_por_pagina = 4;

                $pagina = isset($_GET["pag"]) ? ($_GET["pag"]) : 1;
                $pagina = $pagina -1;

                $inicio = $pagina * $produtos_por_pagina;

                $produtos = mysqli_query($conexao, $sql);

                $total_paginas = ceil(mysqli_num_rows($produtos) / $produtos_por_pagina);

                $produtos = mysqli_query($conexao, $sql." LIMIT $inicio, $produtos_por_pagina");

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

                        <?php if ($pagina > 0): ?>
                        <li>
                            <a href="categorias.php?pag=<?php echo ($pagina); ?>"> <span aria-hidden="true">&laquo;</span></a>
                        </li>
                        <?php endif; ?>
                        <?php for($i=0; $i<$total_paginas; $i++): ?>
                        <li <?php if ($pagina == ($i)) echo 'class="active"' ?>><a href="categorias.php?pag=<?php echo ($i+1); ?>"><?php echo ($i+1); ?></a></li>
                        <?php endfor; ?>
                        <?php if ($pagina < ($total_paginas-1)): ?>
                        <li>
                            <a href="categorias.php?pag=<?php echo ($pagina+2); ?>"><span aria-hidden="true">&raquo;</span></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>
        </div>

    </div>

<?php include("footer.php"); ?>