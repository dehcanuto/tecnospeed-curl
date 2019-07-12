<?php
// Parâmetros para realizar a criação do lote.
$parametros = array(
	'ambiente'  => '2',
	'cpfcnpjtransmissor' => '0000000000000', // CPF/CNPJ do transmissor
	'cpfcnpjempregador' => '0000000000000', // CPF/CNPJ do empregador
	'nrinsc_9' => '08187168',
	'codhorcontrat_13' => '12786',
	'inivalid_14' => '2018-02',
	'hrentr_17' => '0800',
	'hrsaida_18' => '1700',
	'durjornada_19' => '480',
	'perhorflexivel_20' => 's',
	'tpinterv_22' => '1', // 1 - horário fixo | 2 - horário variável.
	'durinterv_23' => '100',
	'iniinterv_24' => '1700',
	'terminterv_25' => '1800'
);

// Função em Curl.
$credenciais = array(
	'cnpj_sh: 0000000000000',
	'empregador: 0000000000000',
	'token_sh: xxxxxxxxxxxxxxxxxxxxxx',
	'content-type: text/tx2'
);

// Método com indentação e organizado.
$tx2 =  "cpfcnpjtransmissor=".$parametros['cpfcnpjtransmissor']."\r\n";
$tx2 .= "cpfcnpjempregador=".$parametros['cpfcnpjempregador']."\r\n";
$tx2 .= "idgrupoeventos=1\r\n";
$tx2 .= "versaomanual=2.5.00\r\n"; // Deixar a versão 2.5.00 por default.
$tx2 .= "ambiente=".$parametros['ambiente']."\r\n\r\n";
$tx2 .= "incluirs1050\r\n\r\n";
$tx2 .= "tpamb_4=2\r\n";
$tx2 .= "procemi_5=1\r\n";
$tx2 .= "verproc_6=1.0\r\n";
$tx2 .= "tpinsc_8=1\r\n";
$tx2 .= "nrinsc_9=".$parametros['nrinsc_9']."\r\n";
$tx2 .= "codhorcontrat_13=".$parametros['codhorcontrat_13']."\r\n";
$tx2 .= "inivalid_14=".$parametros['inivalid_14']."\r\n";
$tx2 .= "hrentr_17=".$parametros['hrentr_17']."\r\n";
$tx2 .= "hrsaida_18=".$parametros['hrsaida_18']."\r\n";
$tx2 .= "durjornada_19=".$parametros['durjornada_19']."\r\n";
$tx2 .= "perhorflexivel_20=".$parametros['perhorflexivel_20']."\r\n";
$tx2 .= "incluirhorariointervalo_21\r\n";
$tx2 .= "tpinterv_22=".$parametros['tpinterv_22']."\r\n";
$tx2 .= "durinterv_23=".$parametros['durinterv_23']."\r\n";
$tx2 .= "iniinterv_24=".$parametros['iniinterv_24']."\r\n";
$tx2 .= "terminterv_25=".$parametros['terminterv_25']."\r\n";
$tx2 .= "salvarhorariointervalo_21\r\n";
$tx2 .= "salvars1050";

// Início da execução do curl.
$ch = curl_init();
curl_setopt_array($ch, [
	CURLOPT_URL => "https://api.tecnospeed.com.br/esocial/v1/evento/gerar/xml",    
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_HTTPHEADER => $credenciais,
	CURLOPT_POSTFIELDS => $tx2
]);

// Método puro.
$res = curl_exec($ch);

// Callback tratado em JSON.
$response = json_decode($res);

// Todos os tipos de retornos.
print('Retorno da mensagem: ' . $response->message . PHP_EOL ); // Imprime a mensagem do retorno.
print('Retorno decodificado: ' . $response . PHP_EOL);
print('Retorno puro: ' . $res . PHP_EOL);

curl_close($ch);
?>