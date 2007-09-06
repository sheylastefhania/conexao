<? session_start();?>

:: CADASTRO DE USUÁRIO
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
<title>SYSCO-- Cadastro:: Usuarios</title>
</head>

<body>
<p>
<? 
  



if(($_SESSION[$perfilusu])=="ADMINISTRADOR") {

include "conecta.php";

$estado=$_GET['estado']; // guarda a opção escolhida

echo "----_ CADASTRO DE USUARIOS _----";

echo "<select name='select' size=1 value='2' onChange='getStates(this);'>";
echo "<option value=''>-- SELECIONE UMA OPÇÃO --</option>";
echo "<option value='1' if ($estado==1){ echo 'SELECTED'} > ADICIONAR USUÁRIO </option>";
echo "<option value='2' if ($estado==2){ echo 'SELECTED'} > EDITAR USUÁRIO </option>";
echo "<option value='3' if ($estado==3){ echo 'SELECTED'} > APAGAR USUÁRIO </option>";
echo "</select>";
//fazer onclick para atualizar quando for selecionado






switch($estado) {
//------------------------------------------------------
case '01': // adicionar
	echo "<form action='visualiza.php' method='post'>";
	
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
	
	echo "<input type='hidden' name='opcao' value='1' >"; // VAI PASSAR OPÇÃO COM O VALOR 1 para visualiza
	echo "<input name='submit' type='submit' value='Cadastrar'/>";
	
	echo "</form>";	
    
	echo "<i> Todos os campos são de preenchimento obrigatório. </i>"; // Mensagem
	
	break;
	
//------------------------------------------------------
case '02': // editar


	$sql= "SELECT * FROM usuario";
	$resultado=mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados".mysql_error());
	
	echo "<br>";
	echo "<br>";
	echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
	echo "<tr>";  // row --> linha
	echo "<th width=100>Código do Usuario</th>"; // th -> coluna
	echo "<th width=100>Funcionario</th>";
	echo "<th width=100>Login</th>";
    echo "<th width=100>Email</th>"; // nao mostrar senha, recadastrar senha se usuario esqueceu
	echo "<th width=50>Editar</th>";
	
	echo "</tr>";

	$option=1; // parâmetro usado na pagina de confirmação
	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_usuario"]; // campo chave de busca
				
		$campo1=$linha["cod_func"]; // campo1
		$campo2=$linha["login"];    //campo2
		$campo3=$linha["senha"];    //campo3
		$campo4=$linha["email"];    //campo4
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=100>$campo4&nbsp;</th>";

		echo "<th width=50><a href='editar.php?opcao=$option&id=$codigo'>Editar</a><br></th>";

		echo "</tr>";
		echo "<br>";
		}
		
	echo "</table>";
	break;
	
//------------------------------------------------------
case '03': // apagar

	$sql= "SELECT * FROM usuario";
	$resultado=mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
	
	echo "<br>";
	echo "<br>";
	echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
	echo "<tr>";  // row --> linha
	echo "<th width=100>Código:</th>"; // th -> coluna
	echo "<th width=100>Nome:</th>";
	echo "<th width=100>Login:</th>";
	echo "<th width=100>Senha:</th>";
	echo "<th width=100>Email:</th>";
	
	echo "<th width=50>Apagar</th>";
	echo "</tr>";

    $opcao=1; // parâmetro usado na pagina Verexcluido.php

	while ($linha=mysql_fetch_array($resultado)){ // preenche tabela com todos os registros
		$codigo=$linha["cod_usuario"];
		
		
		$campo1=$linha["cod_func"];
		$campo2=$linha["login"];
		$campo3=$linha["senha"];
		$campo4=$linha["email"];
		
		
		echo "<tr>"; // row = linha
		echo "<th width=15>$codigo&nbsp;</th>";
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=100>$campo3&nbsp;</th>";
		echo "<th width=100>$campo4&nbsp;</th>";
		
		echo "<th width=50><a href='verexcluido.php?opcao=$opexc$opcao&id=$codigo'>Apagar</a><br></th>";
		echo "</tr>";
		echo "<br>";
		}
	echo "</table>";
	break;
} //fim do switch case

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
<p><a href="/sysco/MenuAdm.php" target="_blank">Voltar</a></p>
</body>
</html>
