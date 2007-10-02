<html>
<head>
<title>Confirma Movimenta&ccedil;&atilde;o Financeira</title>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<div align="center" class="td_title">Confirma Movimenta&ccedil;&atilde;o Financeira</div>
<?
include "conecta.php";

echo "<form action='confMovGer2.php?codigoMov=$id&valorsel=$valor1' method='post'>";
	$sql= "SELECT * FROM movimentacao WHERE (cod_movimentacao = $id)";

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
		$campo1=$linha["valor"];
		$campo2=$linha["categoria"];
		$campo3=$linha["beneficiado"];
		$campo4=$linha["descricao"];
        
		echo "<tr>"; // row = linha
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=100>$campo3&nbsp;</th>";
		echo "<th width=100>$campo4&nbsp;</th>";
		echo "</tr>";

	}
   echo "</table>";
   
   $sql= "SELECT * FROM conta WHERE (ativo = 'SIM')";

   $resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a confirmacao dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico." );

   echo "<br>";
   echo(":: SELECIONE AS CONTAS DA MOVIMENTAÇÃO");
   echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
   echo "<tr>";  // row --> linha
   echo "<th width=100>Código da Conta</th>"; // th -> coluna
   echo "<th width=100>Nome</th>";
   echo "<th width=50>Selecao</th>";
   echo "</tr>";
   
   while ($linha=mysql_fetch_array($resultado)){
    	$conta=$linha["cod_conta"];
		$campo1=$linha["nome"];

		echo "<tr>"; // row = linha
		echo "<th width=15>$conta&nbsp;</th>";   //nao permitir que o código seja alterado
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=50><input name='selecao[]' type='checkbox' value='$conta' ><br></th>";
		echo "</tr>";
		echo "<br>";

	}
   echo "</table>";
   echo "<br>";
echo "<input name='submit' type='submit' value='Selecao'/>";
echo "</form>";

?>
</body>
</html>
