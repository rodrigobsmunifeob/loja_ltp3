<?php
include("conexao.php");
$produto = mysqli_fetch_array(mysqli_query($conexao, "SELECT * FROM produtos WHERE id_produto=".$_REQUEST['id']));
$categorias = mysqli_query ($conexao, 
	"SELECT * FROM produtos WHERE id_categoria = ".$produto['id_categoria']." AND id_produto <> ".$_REQUEST['id']." ORDER BY RAND() LIMIT 2;");
$nome_categoria = mysqli_fetch_array(mysqli_query($conexao,
	"SELECT * FROM categorias WHERE id_categoria = ".$produto['id_categoria']));
include("header.php");
?>


<div class="container">
<h2><?=substr($produto['nome'], 0, 40)?></h2>
<hr>
	<div class="row">

		<!-- COLUNA ESQUERDA - IMAGEM DO PRODUTO -->
		<div class="col-sm-12 col-md-5">
			<div class="panel panel-default">
			  <div class="panel-heading"><span class="titulo">Galeria</span></div>
			  <div class="panel-body">
			    <img src="assets/produtos/<?=$produto['id_produto']?>.png" class="img-responsive">
			  </div>
			</div>
			
			<div class="panel panel-default hidden-xs">
				<div class="panel-heading"><span class="titulo"><?php echo $nome_categoria["categoria"]; ?></span></div>
				<div class="panel-body">

					<div class="row">
						<?php
						while ($categoria = mysqli_fetch_array($categorias)):	
						?>
						<div class="col-sm-12 col-md-6">
							<div class="thumbnail">
								<a href="produto.php?id=<?php echo $produto['id_produto']; ?>">
									<img src="assets/produtos/<?=$categoria['id_produto']; ?>.png">
								</a>								
								<div class="caption">
									<h4 class="titulo"><a href="produto.php?id=<?php echo $produto['id_produto']; ?>">
										<?=substr($categoria['nome'], 0, 30); ?>...
									</a></h4>
									<p class="preco">R$ <?=number_format($categoria['preco'], 2, ',', '.'); ?></p>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
					<a href="categorias.php?id=<?=$produto['id_categoria']?>">
				<button type="button" class="btn btn-primary pull-right">
						Ver Todos
				</button></a>
				</div>
			</div>
			
		</div>
		
		

		<!-- COLUNA DIREITA -->
		<div class="col-sm-12 col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="titulo">Dados</span></div>
				<div class="panel-body">
				
					<!-- NOME E VALOR DO PRODUTO -->
					<h4 style="margin:0"><?=$produto['nome']?></h4><hr style="margin:10px 0">
					
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#tabelaParcelas">
						Ver Parcelas
					</button>
					
					<p>Por R$ <span style="font-size:180%; font-weight:strong"><?=$produto['preco']?></span>
					ou em <b>10x</b> de R$ <b><?=$produto['preco']/10?></b> </p>
					
					<hr style="margin:10px 0">
					
					<!-- TABELA DE PARCELAS -->
					<div class="modal fade" id="tabelaParcelas" tabindex="-1"
						role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title pull-left" id="exampleModalLabel">Detalhes do Parcelamento</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<table class="table">
									<?php for ($i=1; $i<=10; $i++) : ?>
										<tr>
											<td><?=$i?>x</td>
											<td><?=number_format($produto['preco']/$i, 2, ',', '.')?></td>
											<td>sem juros</td>
											<td>total <?=$produto['preco']?></td>
										</tr>
									<?php endfor; ?>
									</table>
								</div>								
							</div>
						</div>
					</div>

					<!-- SELEÇÃO DE QUANTIDADE E BOTÃO COMPRAR -->
					<form action="carrinho.php" method="get">
						<div class="pull-left">
							<input type="hidden" name="acao" value="adicionar">
							<input type="hidden" name="id" value="<?php echo $produto['id_produto']?>">						
							<input name="qnt" type="number" value="1" min="1" max="<?=($produto['estoque'])?>" 
							class="pull-left" style="padding: 6px; width:60px;">
						</div>
						<div class="input-group-btn pull-left">
							<input type="submit" value="Comprar" class="btn btn-primary btn-danger" role="button">
						</div>						
					</form>
					
					<span class="pull-right">(<?=($produto['estoque'])?> unidades em estoque)</span>
					
				</div>
			</div>
			
			<!-- DESCRIÇÃO DO PRODUTO -->
			<div class="panel panel-default">
			  <div class="panel-heading"><span class="titulo">Descrição</span></div>
			  <div class="panel-body">
			    <p align="justify"><?=nl2br($produto['descricao'])?></p>
			  </div>
			</div>
		</div>

	</div>
</div>

<?php include("footer.php"); ?>