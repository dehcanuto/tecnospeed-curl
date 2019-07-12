<?php
header('Content-Type: application/json; charset=utf-8');  

// Função em Curl.
// Método funcionando.
$idLote = 'xxxxxxxxxxxxxxxx';
$credenciais = array(
	'cnpj_sh: 000000000000', // CNPJ do cliente.
	'token_sh: xxxxxxxxxxxxxxxx', // Token da Software House.
	'empregador: 000000000000' // CNPJ do empregador.
);

$ch = curl_init('https://api.tecnospeed.com.br/esocial/v1/evento/consultar/'.$idLote.'?ambiente=2');
curl_setopt_array($ch, [
	CURLOPT_CUSTOMREQUEST => 'GET',
	CURLOPT_HTTPHEADER => $credenciais, 
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_HTTPGET => 1,
	CURLOPT_FOLLOWLOCATION => true,
]);

// Método cru.
$res = curl_exec($ch);

// Método tratado.
$response = json_decode($res);

print('Retorno da mensagem: ' . $response->message . PHP_EOL . PHP_EOL); // Imprime a mensagem do retorno.
print('Retorno completo: ' . $response . PHP_EOL);

curl_close($ch);
?>