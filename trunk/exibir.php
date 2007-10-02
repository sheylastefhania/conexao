<html>
<head>
<title>SYSCO</title>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>

<?
include "conecta.php";


switch($opcao) {

//------------------------------------------------------
case '1': // exibir relatorio acesso por data



if (empty($data1) and empty($data2)) {  // verifica se os campo nome,login e senha estao em branco
	
	echo "<i>Nenhum periodo foi selecionado. Por favor, indique um periodo para continuar esta    operacao.</i>";

}
elseif (empty($data1) or empty($data2)){

     echo "<i>Periodo selecionado e invalido. Por favor, indique outro periodo.</i>";

}
else{
	$sql="SELECT * FROM acesso where datacesso between ('$data1') and ('$data2')"; //os paranteses e para poder utilizar os apostrofos requeridos no comando between
    
	$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados ".mysql_error());
	

	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Código</th>"; // th -> coluna
	
	echo "<th width=100>Usuario </th>";
    echo "<th width=100>Data </th>";
	echo "<th width=100>Hora </th>";
	echo "<th width=50>IP</th>";
	echo "</tr>";
    echo "RELATORIO DE ACESSO POR DATA<br>";
	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_acesso"]; // campo chave de busca
				
		$campo1=$linha["usuario"]; // campo1
		$campo2=$linha["datacesso"];    //campo2
		$campo3=$linha["hora"];    //campo3
		$campo4=$linha["IP"];    //campo4
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=100>$campo3&nbsp;</th>";
		echo "<th width=50>$campo4&nbsp;</th>";
	   	echo "</tr>";
		}
		
	echo "</table>";
}

break;

//------------------------------------------------------
case '2': // exibir relatorio acesso por usuario

$sql="SELECT * FROM acesso WHERE usuario=('$usu')"; 
    
	
	$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());



    echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Código</th>"; // th -> coluna
	
	echo "<th width=100>Usuario </th>";
    echo "<th width=100>Data </th>";
	echo "<th width=100>Hora </th>";
	echo "<th width=50>IP</th>";
	echo "</tr>";
    echo "<br>";

	 
	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_acesso"]; // campo chave de busca
				
		$campo1=$linha["usuario"]; // campo1
		$campo2=$linha["datacesso"];    //campo2
		$campo3=$linha["hora"];    //campo3
		$campo4=$linha["IP"];    //campo4
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";  
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=100>$campo3&nbsp;</th>";
		echo "<th width=50>$campo4&nbsp;</th>";
		

    	echo "</tr>";
		
		}
		
	echo "</table>";
	
break;
//----------------------------------------------
case '3': // exibir relatorio usuario por departamento

if (empty($dpto))  {  // verifica se os campo nome,login e senha estao em branco
   
  echo "<i>Nenhuma opcao foi selecionada Por favor, selecione uma opcao.</i>";
    
	}else{
	
	$sql="SELECT * FROM funcao WHERE cod_dpto=('$dpto')"; 
    	
	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a consulta dos departamentos, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico. ".mysql_error());



    echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=50>Código</th>"; // th -> coluna
	
	echo "<th width=200>Usuario </th>";
    echo "<th width=200>Departamento</th>";
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_funcao"]; // campo chave de busca
				
		$campo1=$linha["cod_usuario"]; // campo1
		$campo2=$linha["cod_dpto"];    //campo2
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";  
		echo "<th width=200>$campo1&nbsp;</th>";
		echo "<th width=200>$campo2&nbsp;</th>";
	   	echo "</tr>";
		
		}
		
	   echo "</table>";
}
break;

//----------------------------------------------
case '4': // exibir relatorio geral de usuarios por departamento
if (empty($dpto))  {  // verifica se os campo nome,login e senha estao em branco
   
  echo "<i>Nenhuma opcao foi selecionada Por favor, selecione uma opcao.</i>";
    
	}else{
	
	$sql="SELECT * FROM funcao WHERE cod_dpto=('$dpto')"; 
    	
	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a consulta dos departamentos, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico. ".mysql_error());



    echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=50>Código</th>"; // th -> coluna
	
	echo "<th width=200>Usuario </th>";
    echo "<th width=200>Departamento</th>";
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_funcao"]; // campo chave de busca
				
		$campo1=$linha["cod_usuario"]; // campo1
		$campo2=$linha["cod_dpto"];    //campo2
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";  
		echo "<th width=200>$campo1&nbsp;</th>";
		echo "<th width=200>$campo2&nbsp;</th>";
	   	echo "</tr>";
		
		}
		
	   echo "</table>";
}

break;

//----------------------------------------------
case '5': // exibir relatorio de usuarios por departamento ordenando por departamento
if (empty($dpto))  {  
   
  echo "<i>Nenhuma opcao foi selecionada Por favor, selecione uma opcao.</i>";
    
	}else{
	
	$sql="SELECT * FROM funcao ORDER BY cod_dpto,cod_usuario"; 
    	
	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a consulta dos departamentos, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico. ".mysql_error());



    echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=50>Código</th>"; // th -> coluna
	
	echo "<th width=200>Usuario </th>";
    echo "<th width=200>Departamento</th>";
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_funcao"]; // campo chave de busca
				
		$campo1=$linha["cod_usuario"]; // campo1
		$campo2=$linha["cod_dpto"];    //campo2
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";  
		echo "<th width=200>$campo1&nbsp;</th>";
		echo "<th width=200>$campo2&nbsp;</th>";
	   	echo "</tr>";
		
		}
		
	   echo "</table>";
}

break;

//----------------------------------------------
case '6': // exibir relatorio geral de usuario

$sql= "SELECT * FROM acesso ORDER BY datacesso";

$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());
	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Código</th>"; // th -> coluna
	
	echo "<th width=100>Usuario </th>";
    echo "<th width=100>Data </th>";
	echo "<th width=100>Hora </th>";
	echo "<th width=50>IP</th>";
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_acesso"]; // campo chave de busca
				
		$campo1=$linha["usuario"]; // campo1
		$campo2=$linha["datacesso"];    //campo2
		$campo3=$linha["hora"];    //campo3
		$campo4=$linha["IP"];    //campo4
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=100>$campo3&nbsp;</th>";
		echo "<th width=50>$campo4&nbsp;</th>";
		

	    echo "</tr>";
	 	}
		
	echo "</table>";

break;

//----------------------------------------------
case '7': // exibir relatorio de extrato de contas


$sql= "SELECT * FROM conta WHERE nome=('$verconta') ";

$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());
	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Código</th>"; // th -> coluna
	
	echo "<th width=100>Conta </th>";
    echo "<th width=100>Saldo</th>";
	echo "<th width=200>Departamento</th>";
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_conta"]; // campo chave de busca
				
		$campo1=$linha["nome"]; // campo1
		$campo2=$linha["saldo"];    //campo2
		$campo3=$linha["cod_depto"];    //campo3
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=200>$campo3&nbsp;</th>";
		  echo "</tr>";
	 	}
		
	echo "</table>";

break;

//----------------------------------------------
case '8': // exibir relatorio  de extrato de contas por  periodo

$sql="select * from movimentacao,funcdepto,conta,departamento WHERE beneficiado = cod_funcdepto and funcdepto.departamento=departamento.nome having conta.cod_depto=departamento.cod_depto";


//$sql= "SELECT DISTINCT data_movimentacao FROM movimentacao ORDER BY data_movimentacao";

$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());
	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Código</th>"; // th -> coluna
	
	echo "<th width=100>Conta </th>";
    echo "<th width=100>Saldo</th>";
	echo "<th width=300>Departamento</th>";
	echo "<th width=200>Data</th>";
	
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_conta"]; // campo chave de busca
				
		$campo1=$linha["nome"]; 
		$campo2=$linha["saldo"];    
		$campo3=$linha["cod_depto"];   
		$campo4=$linha["data_movimentacao"];
		
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=300>$campo3&nbsp;</th>";
		echo "<th width=200>$campo4&nbsp;</th>";
		
    	echo "</tr>";
	 	
		}
		
	echo "</table>";

break;

//----------------------------------------------
case '9': // exibir relatorio  de contas agrupados por departamento

$sql="SELECT conta.nome AS nomeconta,saldo,conta.cod_depto,departamento.cod_depto,departamento.nome AS nomedepto FROM conta,departamento WHERE conta.cod_depto=departamento.cod_depto";

$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());
	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Conta </th>";
    echo "<th width=100>Saldo</th>";
	echo "<th width=300>Departamento</th>";

	
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	

		$campo1=$linha["nomeconta"]; 
		$campo2=$linha["saldo"];    
		$campo3=$linha["nomedepto"];   

		
		
		echo "<tr>"; // row = linha
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=300>$campo3&nbsp;</th>";
		
    	echo "</tr>";
	 	
		}
		
	echo "</table>";

break;

//----------------------------------------------
case '10': // exibir relatorio  movimentacao financeira por categoria


if ($vernatureza=='') {

	$sql="SELECT * FROM movimentacao,categoria,funcdepto WHERE beneficiado=cod_funcdepto AND categoria=cod_categoria";

$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());
	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Valor </th>";
    echo "<th width=10>Natureza</th>";
	echo "<th width=300>Funcionario</th>";
    echo "<th width=200>Departamento </th>";
    echo "<th width=100>Data</th>";
	

	
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	

		$campo1=$linha["valor"]; 
		$campo2=$linha["natureza"];    
		$campo3=$linha["funcionario"];   
		$campo4=$linha["departamento"]; 
		$campo5=$linha["data_movimentacao"];    

		
		
		echo "<tr>"; // row = linha
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=10>$campo2&nbsp;</th>";
		echo "<th width=300>$campo3&nbsp;</th>";
		echo "<th width=200>$campo4&nbsp;</th>";
		echo "<th width=100>$campo5&nbsp;</th>";
		
    	echo "</tr>";
	 	
		}
		
	echo "</table>";






}else{


$sql="SELECT * FROM movimentacao,categoria,funcdepto WHERE beneficiado=cod_funcdepto AND categoria=cod_categoria HAVING natureza=('$vernatureza')";

$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());
	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Valor </th>";
    echo "<th width=10>Natureza</th>";
	echo "<th width=300>Funcionario</th>";
    echo "<th width=200>Departamento </th>";
    echo "<th width=100>Data</th>";
	

	
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	

		$campo1=$linha["valor"]; 
		$campo2=$linha["natureza"];    
		$campo3=$linha["funcionario"];   
		$campo4=$linha["departamento"]; 
		$campo5=$linha["data_movimentacao"];    

		
		
		echo "<tr>"; // row = linha
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=10>$campo2&nbsp;</th>";
		echo "<th width=300>$campo3&nbsp;</th>";
		echo "<th width=200>$campo4&nbsp;</th>";
		echo "<th width=100>$campo5&nbsp;</th>";
		
    	echo "</tr>";
	 	
		}
		
	echo "</table>";
}
break;

//----------------------------------------------
case '11': // exibir relatorio de movimentacao por estado de operacao: CONFIRMADA/PREVISAO/TODAS

if ($veroperacao=='') {

$sql="SELECT * FROM movimentacao,categoria,funcdepto WHERE beneficiado=cod_funcdepto AND categoria=cod_categoria ";

$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());
	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Valor </th>";
    echo "<th width=10>Natureza</th>";
	echo "<th width=300>Funcionario</th>";
    echo "<th width=200>Departamento </th>";
    echo "<th width=100>Data</th>";
	echo "<th width=200>Estado Operacao</th>";

	
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	

		$campo1=$linha["valor"]; 
		$campo2=$linha["natureza"];    
		$campo3=$linha["funcionario"];   
		$campo4=$linha["departamento"]; 
		$campo5=$linha["data_movimentacao"];
		$campo6=$linha["estado_operacao"];    

		
		
		echo "<tr>"; // row = linha
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=10>$campo2&nbsp;</th>";
		echo "<th width=300>$campo3&nbsp;</th>";
		echo "<th width=200>$campo4&nbsp;</th>";
		echo "<th width=100>$campo5&nbsp;</th>";
		echo "<th width=100>$campo6&nbsp;</th>";
		
    	echo "</tr>";
	 	
		}
		
    	echo "</table>";

}else{
$sql="SELECT * FROM movimentacao,categoria,funcdepto WHERE beneficiado=cod_funcdepto AND categoria=cod_categoria HAVING estado_operacao='$veroperacao'";

$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());
	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Valor </th>";
    echo "<th width=10>Natureza</th>";
	echo "<th width=300>Funcionario</th>";
    echo "<th width=200>Departamento </th>";
    echo "<th width=100>Data</th>";
	echo "<th width=200>Estado Operacao</th>";

	
	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	

		$campo1=$linha["valor"]; 
		$campo2=$linha["natureza"];    
		$campo3=$linha["funcionario"];   
		$campo4=$linha["departamento"]; 
		$campo5=$linha["data_movimentacao"];
		$campo6=$linha["estado_operacao"];    

		
		
		echo "<tr>"; // row = linha
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=10>$campo2&nbsp;</th>";
		echo "<th width=300>$campo3&nbsp;</th>";
		echo "<th width=200>$campo4&nbsp;</th>";
		echo "<th width=100>$campo5&nbsp;</th>";
		echo "<th width=100>$campo6&nbsp;</th>";
		
    	echo "</tr>";
	 	
		}
		
	echo "</table>";

}


break;
//----------------------------------------------
case '12': // exibir relatorio 
break;
//----------------------------------------------
case '13': // exibir relatorio 
break;
//----------------------------------------------
case '14': // exibir relatorio 
break;


}//fim do swicth case

?>
</body>
</html>