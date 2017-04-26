<?php

 /* Realiza conexão com MySQL */

	$host = "176.16.1.9";
	$user = "ltp3";
	$pwd = "ltp3";
	$bd = "loja_ltp3";

 	$conexao = mysqli_connect($host, $user, $pwd, $bd);
 	mysqli_set_charset($conexao,"utf8");
 	
 	if (!$conexao) {
 		die("Erro ao conectar ao BD.");
 	}

 	session_start();

 	$_SESSION["carrinho"][1] = array(
 	    "foto" => "assets/produtos/1.png",
        "nome" => "Nome do produto",
        "qnt" => 1,
        "preco" => 1.99
    );

$_SESSION["carrinho"][2] = array(
    "foto" => "assets/produtos/2.png",
    "nome" => "Nome do produto 2",
    "qnt" => 1,
    "preco" => 1.99
);