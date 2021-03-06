<?php include("header.php"); ?>

<div id="myCarousel" class="carousel slide carousel-home"
	data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div style="background: url('assets/banners/1.png');"
			class="item active"></div>

		<div style="background: url('assets/banners/2.png');" class="item"></div>

		<div style="background: url('assets/banners/3.png');" class="item"></div>

		<div style="background: url('assets/banners/4.png');" class="item"></div>
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" role="button"
		data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
		aria-hidden="true"></span> <span class="sr-only">Previous</span>
	</a> <a class="right carousel-control" href="#myCarousel" role="button"
		data-slide="next"> <span class="glyphicon glyphicon-chevron-right"
		aria-hidden="true"></span> <span class="sr-only">Next</span>
	</a>

</div>

<div class="container">
	
		
	<?php
	$categorias = mysqli_query ( $conexao, "SELECT * FROM categorias ORDER BY categoria" );
	while ( $categoria = mysqli_fetch_array ( $categorias ) ) :
	?>
	<div class="row">

		<h3><?php echo $categoria["categoria"]; ?></h3>
		<hr>

	<?php
	$produtos = mysqli_query ( $conexao, "SELECT * FROM produtos WHERE id_categoria = ".$categoria['id_categoria']." ORDER BY RAND() LIMIT 4;" );
	while ( $produto = mysqli_fetch_array ( $produtos ) ):
		
		?>
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
				<a href="produto.php?id=<?php echo $produto['id_produto']; ?>">
					<img src="assets/produtos/<?php echo $produto['id_produto']; ?>.png">
				</a>
				<div class="caption">
					<h4 class="titulo"><a href="produto.php?id=<?php echo $produto['id_produto']; ?>">
						<?=substr($produto['nome'], 0, 38); ?>...
					</a></h4>
					<a href="produto.php?id=<?php echo $produto['id_produto']; ?>"
							class="btn btn-primary btn-danger pull-right" role="button"><span
							class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
							Comprar</a>
					<p class="preco">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
				</div>
			</div>
		</div>
		<?php endwhile; ?>		
		
	</div>
	<?php endwhile; ?>	

</div>

<?php include("footer.php"); ?>