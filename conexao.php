<?php

 /* Realiza conexão com MySQL */

	$host = "176.16.1.9";
	$user = "ltp3";
	$pwd = "ltp3";
	$bd = "loja_ltp3";

 	$conexao = mysqli_connect($host, $user, $pwd, $bd);
 	
 	if (!$conexao) {
 		die("Erro ao conectar ao BD.");
 	}
