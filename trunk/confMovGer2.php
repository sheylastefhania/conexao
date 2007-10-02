<html>
<head>
<title>Informa o valor Debitado/creditado na conta</title>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<div align="center" class="td_title">Informa o valor Debitado/creditado na conta</div>
<?
include "conecta.php";

$id = $_POST['selecao'];

$contas = '0';
while (list(, $value) = each ($id)) {
  $contas = $contas.','.$value;
}

echo "<form action='confMovGer3.php?codigoMov=$codigoMov&contas=$contas&valorsel2=$valorsel' method='post'>";
	$sql= "SELECT * FROM movimentacao WHERE (cod_movimentacao = $codigoMov)";

	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a confirmacao dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico." );

	echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
	echo "<tr>";  // row --> linha
	echo "<th width=100>Código da Movimentacao</th>"; // th -> coluna
	echo "<th width=100>Valor</th>";
	echo "<th width=100>Categoria</th>";
    echo "<th width=100>Beneficiado</th>";
    echo "<th width=100>Descricao</th>";

	echo "</tr>";

	while ($linha=mysql_fetch_array($resultado)){
    	$codigo=$linha["cod_movimentacao"];

		$campoval=$linha["valor"];
		$campo2=$linha["categoria"];
		$campo3=$linha["beneficiado"];
		$campo4=$linha["descricao"];

		echo "<tr>"; // row = linha
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		echo "<th width=100>$campoval&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=100>$campo3&nbsp;</th>";
		echo "<th width=100>$campo4&nbsp;</th>";
		echo "</tr>";

	}
   echo "</table>";

   $sql= "SELECT * FROM conta WHERE (cod_conta in ($contas))";

   $resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a confirmacao dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico." );

   echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
   echo "<tr>";  // row --> linha
   echo "<th width=100>Código da Conta</th>"; // th -> coluna
   echo "<th width=100>Nome</th>";
   echo "<th width=50>Valor</th>";
   echo "</tr>";

   while ($linha=mysql_fetch_array($resultado)){
    	$conta=$linha["cod_conta"];
		$campo1=$linha["nome"];

		echo "<tr>"; // row = linha
		echo "<th width=15>$conta&nbsp;</th>";   //nao permitir que o código seja alterado
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=50><input name='valor[]' type='text' value='$valor' ><br></th>";
		echo "</tr>";
		echo "<br>";

	}
   echo "</table>";
   echo "<br>";
   
echo "<input name='submit' type='submit' value='Confirma'/>";

echo "</form>";

?>
</body>
</html>
