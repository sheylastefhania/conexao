<? session_start();?>

:: CADASTRO DE FUNCIONÁRIO

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<Script Language="JavaScript">
function getStates(what) {
if (what.selectedIndex != '') {
var estado = what.value;
document.location=('cadastrafuncionario.php?estado=' + estado);
}
}

</Script>
<title>SYSCO-- Cadastro:: Funcionários</title>
</head>

<body>
<p>
<? 
  



if(($_SESSION[$perfilusu])=="ADMINISTRADOR") {

include "conecta.php";

$estado=$_GET['estado']; ?>


Escolha a operação:


<select name='select' size=1 value='2' onChange='getStates(this);'>";
<option value=''>-- SELECIONE UMA OPÇÃO --</option>";
<option value='1' <? if ($estado=='1') {echo "selected='selected'";} ?> > ADICIONAR FUNCIONARIO </option>
<option value='2' <? if ($estado=='2') {echo "selected='selected'";} ?> > EDITAR FUNCIONARIO </option>
<option value='3' <? if ($estado=='3') {echo "selected='selected'";} ?> > INATIVAR FUNCIONARIO </option>
</select>
<?
//fazer onclick para atualizar quando for selecionado



switch($estado) {
//------------------------------------------------------
case '01': // adicionar
	echo "<form action='verfuncionario.php' method='post'>";
	

	echo "Nome          :  <input name='nome' type='text' size=30><br>";
	echo "CPF          :  <input name='cpf' type='text' size=30><br>";
	echo "Logradouro   :  <input name='logradouro' type='text' size=30>";	
	echo "Tipo Logradouro   :  <input name='tipolog' type='text' size=30>";
	echo "Numero          :  <input name='num' type='text' size=30><br>";
	echo "Complemento          :  <input name='complemento' type='text' size=30>";
	echo " Tipo Complemento          :  <input name='tipocomp' type='text' size=30><br>";
	echo "Bairro          :  <input name='bairro' type='text' size=30><br>";
	echo "Cidade          :  <input name='cidade' type='text' size=30><br>";
	echo "Estado          :  <input name='estado' type='text' size=30>";
	echo "  CEP           : <input name='cep' type='text' size=30><br>";
	echo "Telefone          :  <input name='fone' type='text' size=30>";
	echo "Tipo Telefone          :  <input name='tipofone' type='text' size=30><br>";
	echo "Administrador          :  <input name='adm' type='text' size=30><br>";
	
	
	echo "<input type='hidden' name='ativo' value='SIM' >";	 // enviar valor para inativar o funcionario

	
	echo "<input name='submit' type='submit' value='Cadastrar'/>";
	
	echo "</form>";	
    
	break;
	
//------------------------------------------------------
case '02': // editar


	$sql= "SELECT * FROM funcionario";
	$resultado=mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados".mysql_error());
	
	
	echo "<br>";
	echo "<br>";
	echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Código do Usuario</th>"; // th -> coluna
	
	echo "<th width=100>Nome </th>";
    echo "<th width=50>CPF </th>";
	echo "<th width=100>Administrador </th>";
	echo "<th width=50>Ativo</th>";
	echo "<th width=50>Editar</th>";
	echo "</tr>";

	$option=3; // parâmetro usado na pagina de editar.php
	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_func"]; // campo chave de busca
				
		$campo1=$linha["nome"]; // campo1
		$campo2=$linha["cpf"];    //campo2
		$campo3=$linha["administrador"];    //campo3
		$campo4=$linha["ativo"];    //campo4
		

		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=100>$campo3&nbsp;</th>";
		echo "<th width=100>$campo4&nbsp;</th>";
		

		echo "<th width=50><a href='editar.php?opcao=$option&id=$codigo'>Editar</a><br></th>";

		echo "</tr>";
		echo "<br>";
		}
		
	echo "</table>";
	break;
	
//------------------------------------------------------
case '03': // Inativar Funcionario

	$sql= "SELECT * FROM funcionario where ativo='SIM'";
	$resultado=mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados".mysql_error());
	
	
	echo "<br>";
	echo "<br>";
	echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Código do Usuario</th>"; // th -> coluna
	
	echo "<th width=100>Nome </th>";
    echo "<th width=50>CPF </th>";
	echo "<th width=100>Administrador </th>";
	echo "<th width=50>Ativo</th>";
	echo "<th width=50>Inativar</th>";
	echo "</tr>";

	$option=4; // parâmetro usado na pagina de editar.php
	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_func"]; // campo chave de busca
				
		$campo1=$linha["nome"]; // campo1
		$campo2=$linha["cpf"];    //campo2
		$campo3=$linha["administrador"];    //campo3
		$campo4=$linha["ativo"];    //campo4
		

		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=100>$campo3&nbsp;</th>";
		echo "<th width=100>$campo4&nbsp;</th>";
		

		echo "<th width=50><a href='editar.php?opcao=$option&id=$codigo'>Inativar</a><br></th>";

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
