<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado</title>
</head>
<body>
    <header>
        <h1>Resultado do processamento</h1>
    </header>
    <main>
     <p>
    <?php 


    
        $inicio = date("m-d-Y", strtotime("-7 days")); 
        /* o dia de hoje menos 7 dias / string para tempo */
        $fim = date("m-d-Y");
        $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$inicio.'\'&@dataFinalCotacao=\''.$fim.'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';


         $dados = json_decode(file_get_contents($url),true);



         $cotacao = $dados["value"][0]["cotacaoCompra"];
    
    
    
    $valor = $_POST["value01"] ?? 0;

    $resultado = $valor / $cotacao;

    $padrao = numfmt_create("pt_BR",NumberFormatter::CURRENCY);

    echo "Seus ".numfmt_format_currency($padrao,$valor, "BRL")." equivalem a <strong>".numfmt_format_currency($padrao, $resultado, "USD"). "</strong>";

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*


    
    $value = $_POST["value"];
    $dolar = 5.79;

    $url = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarDia(dataCotacao=@dataCotacao)?@dataCotacao=%2703-10-2025%27&$top=100&$format=text/html&$select=cotacaoCompra,cotacaoVenda,dataHoraCotacao";

    $resultado = $value / $url;
    
    echo " Seus R$ $value equivalem a <strong> US$ $resultado </strong>."*/



    ?>
      
      </p>

    <p><a href="javascript:history.go(-1)" style="text-decoration: none; color:aliceblue; "> Voltar para a página anterior.</a></p>
    </main>
</body>
</html>