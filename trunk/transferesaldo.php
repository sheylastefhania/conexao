<? session_start();?>
<html>
<head>
<title>Transf&ecirc;rencia de Saldo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<p>
<div align="center" class="td_title">Transferencia de Saldo</div>


<? 
  
if(($_SESSION[$perfilusu])=="GERENTE FINANCEIRO") {

include "conecta.php";

echo "<form action='visualizaTransferencia.php' method='post'>";

echo "<br>";
echo "<br>";
//SELECT CONTA 

echo "<div align='left'><i>Selecione a Conta de Origem :  </i></div>";
echo "<select name='contaOrigem' >";

$sql=mysql_query("SELECT * FROM CONTA") or die ("Houve erro na selecao da tabela");

echo "<option value=''>-- SELECIONE A CONTA --</option>";
while ($linha=mysql_fetch_array($sql)) {
  $codigo=$linha['cod_conta'];
  $campo1=$linha['nome'];
  echo "<option value='$codigo'>$campo1</option>"; // armazena o conteudo $campo 
}
echo "</select>";

echo "<br>";
//SELECT CONTA DESTINO
echo "<div align='left'><i>Selecione a Conta de Destino :  </i></div>";
echo "<select name='contaDestino' >";
$sql=mysql_query("SELECT * FROM CONTA WHERE ATIVO = 'SIM'") or die ("Houve erro na selecao da tabela");

echo "<option value=''>-- SELECIONE A CONTA --</option>";
while ($linha=mysql_fetch_array($sql)) {
  $codigo=$linha['cod_conta'];
  $campo2=$linha['nome'];
  echo "<option value='$codigo'>$campo2</option>"; // armazena o conteudo $campo selecionado em 
}
echo "</select>";


echo "<br>";
echo "Valor.....................................:<input name='saldo' type='text' size=27><br>";
echo "<br>";

echo "<input name='submit' type='submit' value='Transferir'/>";
echo "</form>";
echo "<blockquote><blockquote><div align='center' class='fsflink'><i> Todos os campos sao de preenchimento obrigatório . . .</i></div></blockquote></blockquote>"; // Mensagem

}else{
  if ($_SESSION[$perfilusu]=="") {
   echo "<blockquote><blockquote><div align='center' class='fsflink'><i>Voce precisa estar logado para utilizar esta pagina . . .</i></div></blockquote></blockquote>";

}else{
   if ($_SESSION[$perfilusu]<>"GERENTE FINANCEIRO")

    echo "<blockquote><blockquote><div align='center' class='fsflink'><i>Voce precisa ter o perfil de gerente financeiro para utilizar esta pagina . . .</i></div></blockquote></blockquote>";
}

}

?>
</p>
<p><a href="/sysco/MenuGerente.php" target="_parent"><div align="center" class="copyright">Voltar</div></a></p>
</body>
</html>