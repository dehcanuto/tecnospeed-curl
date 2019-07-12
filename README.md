# Instruções para utilizar a API.

## 1.0 : GERAR O LOTE ( tx2.php )

### Geral
O arquivo de integração do tx2.php serve para criar o xml do lote para consulta. O callback irá retornar uma ID que será utilizada para dar o retorno das consultas da API via a folha api.php.

### Parâmetros
Todo os parâmetros que vão no body do curl (CURLOPT_POSTFIELDS) precisam estar inline, segundo a documentação e com a separação de quebra de linha entre os parâmetros (\r\n).

### Exemplo de retorno quando gera o lote.

```JSON
{	
	"message":"Evento sendo gerado xml",
	"data": {
		"id":"988c63ee-a605-488e-a502-1e2455eff5b1",
		"status_envio": {
			"codigo":50,
			"mensagem":"Lote Recebido com Sucesso."
		},
		"ambiente":"2"
	}
}
```

## 2.0 : CONSULTA DE LOTE ( api.php )

### Geral
A api de consulta já retorna em JSON com os dados da requisicao.

### Exemplo de retorno da api (o exemplo está decodificado mas retorna em json).

```php
stdClass Object (
	[message] => Evento retornado
	[data] => stdClass Object (
		[eventos] => Array (
			[0] => stdClass Object (
				[xmlns] => http://www.esocial.gov.br/schema/evt/evtTabHorTur/v02_05_00
				[evtTabHorTur] => stdClass Object (
					[Id] => ID2080088454060002019061120433900001
					[ideEvento] => stdClass Object (
						[tpAmb] => 2
						[procEmi] => 1
						[verProc] => 1.0
					)
					[ideEmpregador] => stdClass Object (
						[tpInsc] => 1
						[nrInsc] => 08187168
					)
					[infoHorContratual] => stdClass Object (
						[inclusao] => stdClass Object (
							[ideHorContratual] => stdClass Object (
								[codHorContrat] => 12786
								[iniValid] => 2018-02
							)
							[dadosHorContratual] => stdClass Object (
								[hrEntr] => 0800
								[hrSaida] => 1700
								[durJornada] => 480
								[perHorFlexivel] => s
								[horarioIntervalo] => stdClass Object (
									[tpInterv] => 1
									[durInterv] => 100
									[iniInterv] => 1700
									[termInterv] => 1800
								)
							)
						)
					)
				)
				[id] => ID2080088454060002019061120433900001
			)
		)
		[cnpj_sh] => 08008845406
		[id] => 988c63ee-a605-488e-a502-1e2455eff5b1
		[xml] => <eventos><evento Id="ID2080088454060002019061120433900001"><eSocial xmlns="http://www.esocial.gov.br/schema/evt/evtTabHorTur/v02_05_00"><evtTabHorTur Id="ID2080088454060002019061120433900001"><ideEvento><tpAmb>2</tpAmb><procEmi>1</procEmi><verProc>1.0</verProc></ideEvento><ideEmpregador><tpInsc>1</tpInsc><nrInsc>08187168</nrInsc></ideEmpregador><infoHorContratual><inclusao><ideHorContratual><codHorContrat>12786</codHorContrat><iniValid>2018-02</iniValid></ideHorContratual><dadosHorContratual><hrEntr>0800</hrEntr><hrSaida>1700</hrSaida><durJornada>480</durJornada><perHorFlexivel>s</perHorFlexivel><horarioIntervalo><tpInterv>1</tpInterv><durInterv>100</durInterv><iniInterv>1700</iniInterv><termInterv>1800</termInterv></horarioIntervalo></dadosHorContratual></inclusao></infoHorContratual></evtTabHorTur></eSocial></evento></eventos>
		[status_envio] => stdClass Object (
			[codigo] => 50
			[mensagem] => Lote Recebido com Sucesso.
		)
		[json_retorno] => stdClass Object ( )
	)
)
```

## Exemplo de consultas
```php
// Retorna a mensagem.
print_r( $response->message . PHP_EOL);
// Retorna o xml gerado.
print_r( $response->data->xml . PHP_EOL);
```