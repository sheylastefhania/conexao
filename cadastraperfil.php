<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<Script Language="JavaScript">
function getStates(what) {
if (what.selectedIndex != '') {
var estado = what.value;
document.location=('cadastraperfil.php?estado=' + estado);
}
}

</Script>
<title>SYSCO :: Cadastro -- Perfil de Usuarios --</title>
</head>

<body>
<p>
 <?
include "conecta.php";

$estado=$_GET['estado']; // guarda a opção escolhida  ?>

----_ CADASTRO DE PERFIL DE USUARIOS_----;

<select name='select' size=1 value='2' onChange='getStates(this);'>";
<option value=''>-- SELECIONE UMA OPÇÃO --</option>";
<option value='1' <? if ($estado=='1') {echo "selected='selected'";} ?> > ADICIONAR FUNCAO </option>
<option value='2' <? if ($estado=='2') {echo "selected='selected'";} ?> > EDITAR FUNCAO </option>
<option value='3' <? if ($estado=='3') {echo "selected='selected'";} ?> > APAGAR FUNCAO </option>
</select>
<?
//fazer onclick para atualizar quando for selecionado

switch($estado) {
//------------------------------------------------------
case '01': // adicionar
	echo "<form action='confirma.php' method='post'>";
	
// SELECT PARA O USUARIO
	
	echo "Selecione o Usuario:  ";
	echo "<select name='usuario' >";
	
	$sql=mysql_query("SELECT * FROM USUARIO") or die ("Houve erro na selecao da tabela");
	
	echo "<option value=''>-- SELECIONE USUARIO --</option>";

	while ($linha=mysql_fetch_array($sql)) {
		
		$codigo=$linha['cod_usuario'];
		$campousu=$linha['login'];
		
		echo "<option value='$campousu'>$campousu</option>"; // armazena o conteudo $campo selecionado em usuario
	}						   
    echo "</select>";
	echo "<br>";
	echo "<br>";
	
	echo "Funcao       :  <input name='nome' type='text' size=30><br>";
	
	echo "<br>";
	echo "<br>";
												   
//SELECT PARA TIPO FUNÇÃO	                                       }

	echo "Selecione Tipo Função:  ";
	echo "<select name='tpfuncao' >";
	
	$sql=mysql_query("SELECT * FROM TIPOFUNCAO") or die ("Houve erro na selecao da tabela");
	
	echo "<option value=''>-- SELECIONE FUNCAO --</option>";

	while ($linha=mysql_fetch_array($sql)) {
		
		$codigo=$linha['cod_tp_funcao'];
		$campotipo=$linha['desc_tipo'];
		
		echo "<option value='$campotipo'>$campotipo</option>"; // armazena o conteudo $campo selecionado em tipo de funcao
	}						   
    echo "</select>";
	echo "<br>";
	echo "<br>";
	   
		 										
			
// SELECT PARA DEPARTAMENTO

echo "Selecione o Departamento:  ";
	echo "<select name='depto' >";
	
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
		
	echo "<input type='hidden' name='opcao' value='4' >"; // VAI PASSAR OPÇÃO COM O VALOR 4 para visualiza
	echo "<input name='submit' type='submit' value='Cadastrar'/>";
	
	echo "</form>";	
    
	echo "<i> Todos os campos são de preenchimento obrigatório. </i>"; // Mensagem
	
	break;
	
//------------------------------------------------------
case '02': // editar Funcao


	$sql= "SELECT * FROM funcao";
	
	$resultado=mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados".mysql_error());

	
	echo "<br>";
    echo "<br>";
	$titulo= 'Edicao de Funcao';
	
	
	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
	echo "<tr>";  // row --> linha
	

	echo "<th width=100>Cod </th>"; // th -> coluna
	
	echo "<th width=100>Nome  </th>"; // th -> coluna
	echo "<th width=100>Usuario </th>";
	echo "<th width=200>Departamento </th>";
    echo "<th width=150>Perfil </th>"; 
	echo "<th width=50>Editar</th>";
	echo "</tr>";

	$option=2; // parâmetro usado na pagina editar.php
	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_funcao"]; // campo chave de busca
				
		$campo1=$linha["nome"]; // campo1
		$campo2=$linha["cod_usuario"];   //campo2
		$campo3=$linha["cod_dpto"];    //campo3
		$campo4=$linha["perfil_usuario"];//campo4
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=200>$campo3&nbsp;</th>";
		echo "<th width=150>$campo4&nbsp;</th>";

		echo "<th width=50><a href='editar.php?opcao=$option&id=$codigo'>Editar</a><br></th>";

		echo "</tr>";
		echo "<br>";
	}
		
	echo "</table>";
	
	break;
	
//------------------------------------------------------
case '03': // apagar da tabela funcao

	$sql= "SELECT * FROM funcao";
	$resultado=mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
	
	echo "<br>";
	echo "<br>";
	

    echo "<table with=740 border=1 cellpading=1 cellspacing=1>";

	echo "<tr>";  // row --> linha
	echo "<th width=100>Codigo  </th>"; // th -> coluna
	
	echo "<th width=100>Nome  </th>"; 
	echo "<th width=100>Usuario  </th>";
	echo "<th width=150>Departamento </th>";
    echo "<th width=200>Perfil </th>"; 
	echo "<th width=50>Apagar</th>";
	echo "</tr>";

	$opcao=06; // parâmetro a ser passadp para a pagina de confirmação

	while ($linha=mysql_fetch_array($resultado)){ // preenche tabela com todos os registros
		
		$codigo=$linha["cod_funcao"]; // campo chave de busca
				
		$campo1=$linha["nome"]; // campo1
		$campo2=$linha["cod_usuario"];   //campo2
		$campo3=$linha["cod_dpto"];    //campo3
		$campo4=$linha["perfil_usuario"];//campo4
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=150>$campo3&nbsp;</th>";
		echo "<th width=200>$campo4&nbsp;</th>";
		
		echo "<th width=50><a href='confirma.php?opcao=$opcao&id=$codigo'>Apagar</a><br></th>";
		echo "</tr>";
		echo "<br>";
		}
	echo "</table>";
	break;
} //fim do switch case

?>


</p>
<p><a href="/sysco/MenuAdm.php" target="_blank">Retornar Menu</a></p>
</body>
</html>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
