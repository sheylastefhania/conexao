<? session_start();?>
<body>
<p>
<div align="center" class="td_title">Associar Departamentos</div><br><br>

 <?
 include "conecta.php";
 
if(($_SESSION[$perfilusu])=="ADMINISTRADOR") { // testar se o usuario e administrador

echo "<form action='verassociacao.php' method='post'>";
	
// SELECT PARA O DEPARTAMENTO 1

	echo "Selecione o Departamento :  ";
	echo "<select name='depto' >"; // valor onde sera armazenado o departamento escolhido
	
	$sql=mysql_query("SELECT * FROM departamento WHERE ativo='SIM'") or die ("Houve erro na selecao da tabela");
	
	echo "<option value=''>-- SELECIONE DEPARTAMENTO --</option>";

	while ($linha=mysql_fetch_array($sql)) {
		
		$codigo=$linha['cod_depto'];
		$campodepto=$linha['nome'];
		
		echo "<option value='$campodepto'>$campodepto</option>"; 
	                               }					

    echo "</select>";
	echo "<br>";
    echo "<br>";
							   
				
// SELECT PARA DEPARTAMENTO 2




echo "Selecione o Departamento Superior:  ";
	echo "<select name='deptosup' >"; // valor onde sera armazenado o departamento escolhido
	
	$sql=mysql_query("SELECT * FROM departamento WHERE ativo='SIM' ") or die ("Houve erro na selecao da tabela");
	
	echo "<option value=''>-- SELECIONE DEPARTAMENTO --</option>";

	while ($linha=mysql_fetch_array($sql)) {
		
		$codigo=$linha['cod_depto'];
		$campodepto=$linha['nome'];
		
		echo "<option value='$campodepto'>$campodepto</option>"; 
}					

    echo "</select>";
	echo "<br>";
    echo "<br>";
	
	
// envia variaveis para verassociacao.php	
	
	//echo "<input type='hidden' name='opcao' value='16' >"; // VAI PASSAR OPÇÃO COM O VALOR 16 para confirma
	echo "<input name='submit' type='submit' value='Associar'/>";
	
	echo "</form>";	


}else{
  if ($_SESSION[$perfilusu]=="") {
   echo "<i>Voce precisa estar logado para utilizar esta pagina...</i>";

}else{
   if ($_SESSION[$perfilusu]<>"ADMINISTRADOR")

    echo "<i>Voce precisa ter o perfil de administrador para utilizar esta pagina...</i>";
     }
}

?>

<html>
<head>
<title>Associar departamento</title>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<p><a href="/sysco/MenuAdm.php" target="_parent"><div align="center" class="copyright">Voltar</div></a></p>

</html>
