<?php

 /* Realiza conexão com MySQL */

	$host = "171.31.6.163";
	$user = "ltp3";
	$pwd = "ltp3";
	$bd = "loja_ltp3";

 	$conexao = mysqli_connect($host, $user, $pwd, $bd);
 	mysqli_set_charset($conexao,"utf8");
 	
 	if (!$conexao) {
 		die("Erro ao conectar ao BD.");
 	}

 	session_start();

?>