<html>
<head>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
<title>Confirma&ccedil;&atilde;o de transfer&ecirc;ncia</title>
</head>

<body>

<? 


include "conecta.php"; 


  if (empty($contaOrigem) or empty($contaDestino) or empty($saldo)) {  // verifica se os campo nome,login e senha estao em branco

    echo "Ha campos nao preenchidos. Por favor, indique um valor. ! ";
		
  }
  else
  {
    $sqlOrigem=mysql_query("SELECT * FROM CONTA WHERE cod_conta = '$contaOrigem'") or die ("Houve erro na selecao da tabela");
    while($linha=mysql_fetch_array($sqlOrigem)){
      $valida = $linha["saldo"]- $saldo;
    }
    
    if ($valida <= 0){
      echo "Saldo insuficiente!!!";
    }
    else
    {
      $sqlDestino=mysql_query("SELECT * FROM CONTA WHERE cod_conta = '$contaDestino'") or die ("Houve erro na selecao da tabela");
      while($linha=mysql_fetch_array($sqlDestino)){
        $total = $linha["saldo"]+ $saldo;
      }

      $sql="UPDATE conta SET saldo='$valida' WHERE cod_conta='$contaOrigem'";
      $sql=mysql_query($sql) or die ("Ocorreu uma falha durante a transferencia, por favor, tente novamente. Caso o problema se repita, por favor, verifique os arquivos de log para rastrear a excecao." );
      
      $sql="UPDATE conta SET saldo='$total' WHERE cod_conta='$contaDestino'";
      $sql=mysql_query($sql) or die ("Ocorreu uma falha durante a transferencia, por favor, tente novamente. Caso o problema se repita, por favor, verifique os arquivos de log para rastrear a excecao." );
      echo "<h1> Transferencia realizada com sucesso !</h1>";
    }
   }
		
   echo "<form action='transferesaldo.php' method='post'>";
   echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retornar para pag. de cadastro
   echo "</form>";

?>
</body>
</html>
