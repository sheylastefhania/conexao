<? session_start();?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Relat&oacute;rio de Acesso dos Usu&aacute;rios</title>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>

<Script Language="JavaScript">
function getStates(what) {
if (what.selectedIndex != '') {
var estado = what.value;
document.location=('exiberelatorioacesso.php?estado=' + estado);
}
}

</Script>

<body>
<p>
<div align="center" class="td_title">Relat&oacute;rio de Acesso dos Usu&aacute;rios</div>
<? 
  
if(($_SESSION[$perfilusu])=="GERENTE FINANCEIRO") {

include "conecta.php";

$estado=$_GET['estado']; ?>
</p>
<p>Escolha a operacao:
  <select name='select' size=1 value='2' onChange='getStates(this);'>
    ";
 <option value=''>-- SELECIONE ORDENAÇÃO --</option>";
  <option value='1' <? if ($estado=='1') {echo "selected='selected'";} ?> > POR DATA </option>
  <option value='2' <? if ($estado=='2') {echo "selected='selected'";} ?> > POR USUÁRIO </option>
  <option value='3' <? if ($estado=='3') {echo "selected='selected'";} ?> > GERAL </option>
  </select>
</p>
<p>
  <?
//fazer onclick para atualizar quando for selecionado



switch($estado) {
//------------------------------------------------------
case '01': //  ordenado por data

	$sql= "SELECT * FROM acesso ORDER BY datacesso";
	$resultado=mysql_query($sql) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());
	
	echo "<table with=740 border=1  cellpading=1 cellspacing=1 align =center valign =top>";
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
		echo "<br>";
		}
		
	echo "</table>";
	
break;
	
//------------------------------------------------------
case '02': // ordenado por usuario


	$sql= "SELECT * FROM acesso ORDER BY usuario";
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
		

//	echo "<th width=50><a href='editar.php?opcao=$option&id=$codigo'>Editar</a><br></th>";

		echo "</tr>";
		echo "<br>";
		}
		
	echo "</table>";
	
	break;
	
//------------------------------------------------------
case '03': // Geral

	$sql= "SELECT * FROM acesso";
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
		

//	echo "<th width=50><a href='editar.php?opcao=$option&id=$codigo'>Editar</a><br></th>";

		echo "</tr>";
		echo "<br>";
		}
		
	echo "</table>";
	
	break;
	
} //fim do switch case

}else{
  if ($_SESSION[$perfilusu]=="") {
   echo "<i>Voce precisa estar logado para utilizar esta pagina...</i>";

}else{
   if ($_SESSION[$perfilusu]<>"GERENTE FINANCEIRO")

    echo "<i>Voce precisa ter o perfil de gerente para utilizar esta pagina...</i>";
}

}


?>
</p>
<p><a href="/sysco/MenuAdm.php" target="_blank"><div align="center" class="td_title">Voltar</div></a></p>
</body>
</html>
