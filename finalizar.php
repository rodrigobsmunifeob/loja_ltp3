<?php 

	include("header.php");

	// Verifica se ja esta logado. Se nao tiver, da as opcoes abaixo.. Se ja estiver, vai pro checkout.
	if (isset($_SESSION['nome'])) {
		header("Location: checkout.php");
	}

?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">Finalizar Compra</div>
	<div class="panel-body">
		<p></p>
	</div>
	<div class="container">

		<div class="row">

			<div class="col-md-6">
				<div class="thumbnail" style="min-height: 300px;">
					<div class="caption">
						<h3>Não tenho cadastro</h3>
						<p>Caso você ainda não possua cadastro na loja, crie agora.</p>
						<br> <a class="btn btn-success" href="sign_up.php">Criar Cadastro</a>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="thumbnail" style="min-height: 300px;">
					<div class="caption">
						<h3>Já tenho cadastro</h3>
						<p>Caso você já tenha cadastro, faça o login aqui:</p>
						
						 <form class="form" action="index.php" method="post">
						 <input type="hidden" name="next_url" value="checkout.php">
			            <div class="form-group">
			              <input type="text" name="email" placeholder="Email" class="form-control">
			            </div>
			            <div class="form-group">
			              <input type="password" name="password" placeholder="Senha" class="form-control">
			            </div>
			              <button type="submit" class="btn btn-success" value="Login" >Entrar</button>
			          </form>
			          
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

<?php include("footer.php"); ?>