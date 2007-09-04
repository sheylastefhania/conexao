<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<Script Language="JavaScript">
function getStates(what) {
if (what.selectedIndex != '') {
var estado = what.value;
document.location=('cadastrausuario.php?estado=' + estado);
}
}

</Script>
<title>SYSCO -- Solicitar Acesso</title>
</head>

<body>
<p>
<? 
include "conecta.php";
 
	echo "<form action='versolicitacao.php' method='post'>";
	
	echo "Selecione o Funcionario:  ";
	echo "<select name='tipo' >";
	
	$sql=mysql_query("SELECT * FROM funcionario") or die ("Houve erro na selecao da tabela");
	
	echo "<option value=''>-- SELECIONE FUNCIONARIO --</option>";

	while ($linha=mysql_fetch_array($sql)) {
		
		$codigo=$linha['cod_func'];
		$campo=$linha['nome'];
		
		echo "<option value='$campo'>$campo</option>"; // armazena o conteudo $campo selecionado em funcionario
	}
	echo "</select>";
	echo "<br>";
		
	echo "E-mail          :  <input name='email' type='text' size=30><br>";
	echo "Login           : <input name='login' type='text' size=30><br>";
	echo "Senha           : <input name='password' type='password' size=30><br>"; 
	echo "Confirmacao da senha: <input name='password2' type='password' size=30><br> ";
	
echo "<input type='hidden' name='opcao' value='7' >";
 // VAI PASSAR OPÇÃO COM O VALOR 7 para visualiza
 
 //echo "<input type='hidden' name='login' value='login1' >";
	echo "<i> Todos os campos são de preenchimento obrigatório. </i>"; // Mensagem
	
  

echo "<input name='submit' type='submit' value='Cadastrar'/>";
	
	echo "</form>";	
?>
</p>
<p><a href="/sysco/index.php" target="_blank">Voltar</a></p>
</body>
</html>
