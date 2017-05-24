<?php
    include 'conexao.php';

    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $password = mysqli_real_escape_string($conexao, md5($_POST['password']));

        $sql = "SELECT * FROM cliente WHERE email = '" . $email . "' AND senha = '" . $password . "';";

        $login = mysqli_query($conexao, $sql);
        // Se encontrou o login/senha, loga...
        if (mysqli_num_rows($login) > 0) {
            $login = mysqli_fetch_array($login);
            $_SESSION = array_merge($_SESSION, $login);
            
            // redireciona, caso tenha parametro next_url
            if (isset($_POST["next_url"])) header("Location: ".$_POST["next_url"]);
            
        } else {
            $login_incorreto = true;
        }
    }
?>

<?php
    $baseurl = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<?php if (strpos($_SERVER['REQUEST_URI'], "produto.php")!==false): ?>
	<meta property="og:title" content="<?=htmlspecialchars($produto['nome'])?>">
	<meta property="og:description" content="<?=substr($produto['descricao'], 0, 200)?>...">
	<meta property="og:image" content="<?=$baseurl . 'assets/produtos/' . $produto['id_produto']?>.png">
	<meta property="og:url" content="<?=$baseurl . 'produto.php?id=' . $produto['id_produto']?>">
<?php endif; ?>    
    <link rel="icon" href="assets/favicon.ico">
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/carousel.js"></script>
	
	<title>Loja LTP3</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/jumbotron.css" rel="stylesheet">
    
    <link href="assets/css/loja_base.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">LOJA LTP3</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "index.php")!==false) echo 'class="active"'; ?>><a href="index.php">Home</a></li>
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "categorias.php")!==false) echo 'class="active"'; ?>><a href="categorias.php">Categorias</a></li>
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "carrinho.php")!==false) echo 'class="active"'; ?>><a href="carrinho.php">Carrinho</a></li>
            <li <?php if (strpos($_SERVER['REQUEST_URI'], "contact.php")!==false) echo 'class="active"'; ?>><a href="contact.php">Contato</a></li>
            <!-- 
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nome do Cliente <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Minha Conta</a></li>
                <li><a href="#">Meus Pedidos</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Sair</a></li>
              </ul>
            </li>
             -->

          </ul>
        <?php if (!isset($_SESSION['nome'])) { ?>
          <form class="navbar-form navbar-right" action="index.php" method="post">
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Senha" class="form-control">
            </div>
              <button type="submit" class="btn btn-success" value="Login" >Entrar</button>
          </form>
        <?php } else { ?>
            <div class="pull-right">
                <p style="color: #fff; margin-top: 6px;">Olá <b><?php echo $_SESSION['nome']; ?></b>, seja bem vindo(a)! &nbsp; <a class="btn btn-success" href="logout.php">Sair</a></p>
            </div>
        <?php  } ?>
    </div><!--/.nav-collapse -->
    </div>
    </nav>

    <?php if (isset($login_incorreto)) { ?>
        <div style="margin:0;" class="alert alert-danger" role="alert"><b>Erro:</b> Login incorreto. Verifique seu e-mail e/ou senha.</div>
    <?php } ?>