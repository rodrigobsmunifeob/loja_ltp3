<?php
include("header.php");
$produto = mysqli_query($conexao, "SELECT * FROM produtos WHERE id_produto=".$_REQUEST['id']);
$produto = mysqli_fetch_array($produto);
$valor = number_format($produto['preco'], 2, ',', '.');
?>

<div class="container">
<h2><?=substr($produto['nome'], 0, 40)?></h2>
<hr>
	<div class="row">

		<!-- COLUNA ESQUERDA - IMAGEM DO PRODUTO -->
		<div class="col-sm-12 col-md-5">
			<div class="panel panel-default">
			  <div class="panel-heading">Galeria</div>
			  <div class="panel-body">
			    <img src="assets/produtos/<?=$produto['id_produto']?>.png" class="img-responsive">
			  </div>
			</div>
		</div>

		<!-- COLUNA DIREITA -->
		<div class="col-sm-12 col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">Dados</div>
				<div class="panel-body">
				
					<!-- NOME E VALOR DO PRODUTO -->
					<h4 style="margin:0"><?=$produto['nome']?></h4><hr style="margin:10px 0">
					<p>Por R$ <span style="font-size:180%; font-weight:strong"><?=$valor?></span>
					ou em <b>10x</b> de R$ <b><?=$valor/10?></b> (<?=($produto['estoque'])?> unidades em estoque)</p>

					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tabelaParcelas">Ver Parcelas</button>

					<hr>
					
					<!-- TABELA DE PARCELAS -->
					<div class="modal fade" id="tabelaParcelas" tabindex="-1"
						role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title pull-left" id="exampleModalLabel">Detalhes do Parcelamento</h3>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

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

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>

					<!-- SELEÇÃO DE QUANTIDADE E BOTÃO COMPRAR -->
					<div class="input-group">
						<form action="carrinho.php" method="get">
						
						<input type="hidden" name="acao" value="adicionar">
						<input type="hidden" name="id" value="<?php echo $produto['id_produto']?>">
						
						<input name="qnt" type="number" value="1" min="1" max="<?=($produto['estoque'])?>" 
						class="pull-left" style="padding: 6px;">
						<div class="input-group-btn pull-left">
							<input type="submit" value="Comprar" class="btn btn-primary btn-danger" role="button">
						</div>
						</form>
					</div>
					
				</div>
			</div>
			
			<!-- DESCRIÇÃO DO PRODUTO -->
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