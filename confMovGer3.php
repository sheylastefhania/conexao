                                                         <html>
<head>
<title>SYSCO</title>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>

<?
include "conecta.php";


$datatual=date("Y-m-d");

   $val = $_POST['valor'];
    $val2 = $val;
//   $valor1=

   while (list(, $value) = each ($val)) {
     $total = $total+$value;
   }

   //PRECISO OBTER OS DADOS DAS CONTAS DOFORMULÁRIO ANTERIOR PARA EFETIVAR AS OPERACOES, CONFORME A CATEGORIA 'D' OU 'C'

   $sql= "SELECT * FROM conta WHERE cod_conta in ($contas)";
   $resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a confirmacao dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico." );

   $i = 0;
   while ($linha=mysql_fetch_array($resultado)) {
    $conta[$i]=$linha["cod_conta"];
    $i = $i+1;
   }
   
   
  $sql= "SELECT * FROM movimentacao WHERE (cod_movimentacao = '$codigoMov')";
  $resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a confirmacao dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico." );
  
  while ($linha=mysql_fetch_array($resultado)) {
    $codigo=$linha["cod_movimentacao"];
    $valor=$linha["valor"];
    $categoria=$linha["categoria"];
    $beneficiado=$linha["beneficiado"];
    $descricao=$linha["descricao"];
  }

if ($total == $valor){
  $i = 0;
  $val = $_POST['valor'];
  
  while (list(, $value) = each ($val)) {
    $sql= "SELECT * FROM conta WHERE cod_conta in ($conta[$i])";
    $resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a confirmacao dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico." );
    while ($linha=mysql_fetch_array($resultado)) {
      $saldo[$i]=$linha["saldo"];
    }
    
    if ($categoria == 'D'){
       $sal = $saldo[$i]-$value;
    }
    else{
       $sal = $saldo[$i]+$value;
    }


    $sql="UPDATE conta SET saldo ='$sal' WHERE cod_conta = '$conta[$i]'";
    $sql=mysql_query($sql) or die ("Ocorreu uma falha durante a confirmacao dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico." );
 $i = $i+1;
	 
 }
   

	
    $sql2="INSERT INTO movimentacao (valor, categoria, beneficiado, descricao, data_movimentacao, estado_operacao)
    VALUES ('$valorsel2','$categoria','$beneficiado','$descricao', '$datatual', 'C')"; //C confirmado
    $sql2=mysql_query($sql2) or die ("Ocorreu uma falha durante a confirmacao dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico." );

   
 

  $sql="UPDATE movimentacao SET estado_operacao = 'X' WHERE (cod_movimentacao = '$codigoMov')";
  $sql=mysql_query($sql) or die ("Ocorreu uma falha durante a confirmacao dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico." );

  echo "CONFIRMACAO REALIZADA COM SUCESSO!";
  
  echo "<form action='confMovGer.php' method='post'>";
  echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retornar para pag. de cadastro
  echo "</form>";
}
else {
  echo "O VALOR INFORMADO NAO TOTALIZA O VALOR DA MOVIMENTACAO";
    echo "<form action='confMovGer2.php' method='post'>";
  echo "<input name='submit' type='submit' value='Voltar'/>"; // botao para retornar para pag. de cadastro
  echo "</form>";
}

?>
</body>
</html>
