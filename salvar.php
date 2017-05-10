<?php

	/* Procedimentos de finalização de compra:
	 * 1) Cria o pedido no BD
	 * 2) Salva os produtos do carrinho no pedido
	 * 	2.1) Decrementa os estoques
	 * 3) Cria cobrança no PagSeguro
	 * 4) Redireciona usuário para pagamento no PagSeguro
	 */

	include("conexao.php");
	
	// Calcula total do pedido
	$total_pedido = 0;
	foreach ($_SESSION['carrinho'] as $id => $produto) {
		$total_pedido += $produto['preco'] * $produto['qnt'];
	}
	
	$sql = "INSERT INTO `pedidos` (`id_pedido`, `data`, `id_cliente`, `status`, `total_pedido`) VALUES (NULL, NOW(), '".$_SESSION["id_cliente"]."', 'Aguardando Pagamento', '".$total_pedido."');";
	mysqli_query($conexao, $sql);
	$id_pedido = mysqli_insert_id($conexao);
	
	// Salvar itens do pedido
	$produtos_pagseguro = array();
	
	$indice=1;
	foreach ($_SESSION['carrinho'] as $id => $produto) {
		
		$subtotal = $produto['preco'] * $produto['qnt'];
		$sql = "INSERT INTO `pedidos_tem_produtos` (`pedidos_id_pedido`, `produtos_id_produto`, `preco`, `qnt`, `subtotal`) VALUES ('".$id_pedido."', '".$produto['id_produto']."', '".$produto['preco']."', '".$produto['qnt']."', '".$subtotal."');";
		
		// Preenche lista de itens do pagseguro
		$produtos_pagseguro['itemId'.$indice] = $id;
		$produtos_pagseguro['itemDescription'.$indice] = utf8_decode($produto['nome']);
		$produtos_pagseguro['itemAmount'.$indice] = $produto['preco'];
		$produtos_pagseguro['itemQuantity'.$indice] = $produto['qnt'];
		$produtos_pagseguro['itemWeight'.$indice] = '1000';
		$indice++;
		
	}
	

$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

$data['email'] = 'everton.ap.90@gmail.com';
$data['token'] = '6C6DEEE9B3C6411CBC54517F2B351487';
$data['currency'] = 'BRL';
$data['reference'] = $id_pedido;
$data['senderName'] = $_SESSION["nome"];
$data['senderEmail'] = $_SESSION["email"];
$data['shippingType'] = '1';
$data['shippingAddressStreet'] = $_SESSION["end_rua"];
$data['shippingAddressNumber'] = '123';
$data['shippingAddressComplement'] = $_SESSION["end_complemento"];
$data['shippingAddressDistrict'] = $_SESSION["end_bairro"];
$data['shippingAddressPostalCode'] = '01452002';
$data['shippingAddressCity'] = $_SESSION["end_cidade"];
$data['shippingAddressState'] = $_SESSION["end_estado"];
$data['shippingAddressCountry'] = 'BRA';
$data['redirectURL'] = 'http://www.sounoob.com.br/paginaDeAgracedimento';

// Adiciona produtos no array
$data = array_merge($data, $produtos_pagseguro);

$data = http_build_query($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml= curl_exec($curl);

if($xml == 'Unauthorized'){
	//Insira seu código de prevenção a erros
	
	header('Location: erro.php?tipo=autenticacao');
	exit;//Mantenha essa linha
}
curl_close($curl);

$xml= simplexml_load_string($xml);
if(count($xml -> error) > 0){
	//Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
	echo json_encode($xml);
	//header('Location: erro.php?tipo=dadosInvalidos');
	exit;
}
header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);


?>

