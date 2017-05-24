<div class="col-sm-12 col-md-2 img-rounded" style="min-height: 400px; background: #ddd">

    <h4>Minha Conta</h4>
    <hr>

    <ul class="nav nav-pills nav-stacked">
        <li <?php if (strpos($_SERVER['REQUEST_URI'], "cli_inicio.php")!==false) echo 'class="active"'; ?>><a href="cli_inicio.php">Início</a></li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], "cli_pedidos.php")!==false) echo 'class="active"'; ?>><a href="cli_pedidos.php">Meus Pedidos</a></li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], "cli_cadastro.php")!==false) echo 'class="active"'; ?>><a href="cli_cadastro.php">Meu Cadastro</a></li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], "cli_contato.php")!==false) echo 'class="active"'; ?>><a href="contact.php">Contato</a></li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], "logout.php")!==false) echo 'class="active"'; ?>><a href="logout.php">Sair</a></li>
    </ul>

</div>