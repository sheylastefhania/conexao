<? session_start();?>
:: ASSOCIAR FUNCIONARIO A DEPARTAMENTO

<title>SYSCO :: Associar funcionario a departamento </title>
</head>

<body>
<p>
 <?
 include "conecta.php";
 
if(($_SESSION[$perfilusu])=="ADMINISTRADOR") { // testar se o usuario é administrador

echo "<form action='confirma.php' method='post'>";
	
// SELECT PARA O FUNCIONARIO
	
	echo "Selecione Funcionario:  ";
	echo "<select name='funcionario' >";  // valor onde será armazenado o funcionario escolhido
	
	$sql=mysql_query("SELECT * FROM FUNCIONARIO") or die ("Houve erro na selecao da tabela");
	
	echo "<option value=''>-- SELECIONE FUNCIONARIO --</option>";

	while ($linha=mysql_fetch_array($sql)) {
		
		$codigo=$linha['cod_func']; 
		$campofunc=$linha['nome'];
		
	    echo "<option value='$campofunc'>$campofunc</option>"; // armazena o conteudo $campo selecionado em funcionario
	}						   
        echo "</select>";
		
     	echo "<br>";
	    echo "<br>";
												   
				
// SELECT PARA DEPARTAMENTO

echo "Selecione o Departamento:  ";
	echo "<select name='depto' >"; // valor onde sera armazenado o departamento escolhido
	
	$sql=mysql_query("SELECT * FROM departamento") or die ("Houve erro na selecao da tabela");
	
	echo "<option value=''>-- SELECIONE DEPARTAMENTO --</option>";

	while ($linha=mysql_fetch_array($sql)) {
		
		$codigo=$linha['cod_depto'];
		$campodepto=$linha['nome'];
		
		echo "<option value='$campodepto'>$campodepto</option>"; // armazena o conteudo $campo selecionado em funcionario
	}					

    echo "</select>";
	echo "<br>";
    echo "<br>";
		
	echo "<input type='hidden' name='opcao' value='11' >"; // VAI PASSAR OPÇÃO COM O VALOR 11 para confirma
	echo "<input name='submit' type='submit' value='Cadastrar'/>";
	
	echo "</form>";	
    

}else{
  if ($_SESSION[$perfilusu]=="") {
   echo "<i>Voce precisa estar logado para utilizar esta página...</i>";

}else{
   if ($_SESSION[$perfilusu]<>"ADMINISTRADOR")

    echo "<i>Voce precisa ter o perfil de administrador para utilizar esta página...</i>";
}
}

?>


</p>
<p><a href="/sysco/MenuAdm.php" target="_blank">Retornar Menu</a></p>
</body>
</html>
