<?php include("header.php"); ?>

<?php 

	$produto = mysqli_query($conexao, "SELECT * FROM produtos WHERE id_produto=".$_REQUEST['id']);
	$produto = mysqli_fetch_array($produto);
	$valor = number_format($produto['preco'], 2, ',', '.')

?>


<div class="container">
<h2><?=substr($produto['nome'], 0, 40)?></h2>
<hr>
	<div class="row">

		<div class="col-sm-12 col-md-5">
			<div class="panel panel-default">
			  <div class="panel-heading">Galeria</div>
			  <div class="panel-body">
			    <img src="assets/produtos/<?=$produto['id_produto']?>.png" class="img-responsive">
			  </div>
			</div>
		</div>

		<div class="col-sm-12 col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">Dados</div>
				<div class="panel-body">
				
					<h4 style="margin:0"><?=$produto['nome']?></h4><hr style="margin:10px 0">
					<p>Por R$ <span style="font-size:180%; font-weight:strong"><?=$valor?></span>
					ou em <b>10x</b> de R$ <b><?=$valor/10?></b> (<?=($produto['estoque'])?> unidades em estoque)</p>					
					<table class="table">
					<?php for ($i=1; $i<=10; $i++) : ?>
						<tr>
							<td><?=$i?></td>
							<td><?=number_format($produto['preco']/$i, 2, ',', '.')?></td>
							<td>sem juros</td>
							<td>total <?=$valor?></td>
						</tr>
					<?php endfor; ?>
					</table>

					<div class="input-group">
						<input id="qntd" type="number" value="1" min="1" max="<?=($produto['estoque'])?>" class="form-control" aria-label="...">
						<div class="input-group-btn">
							<a href="carrinho.php?acao=adicionar&id=<?php echo $produto['id_produto']?>" class="btn btn-primary btn-danger" role="button">
								<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Comprar
							</a>
						</div>
					</div>
					
				</div>
			</div>
			<div class="panel panel-default">
			  <div class="panel-heading">Descrição</div>
			  <div class="panel-body">
			    <p align="justify"><?=nl2br($produto['descricao'])?></p>
			  </div>
			</div>
		</div>

	</div>
</div>

<?php include("footer.php"); ?>