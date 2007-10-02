<? session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Relat&oacute;rios</title>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>

<Script Language="JavaScript">
function getStates(what) {
if (what.selectedIndex != '') {
var escolha = what.value;
document.location=('ImpMovData.php?escolha=' + escolha);
}
}

</Script>
<body>
<p>

<div align="center" class="td_title">Relat&oacute;rios</div><br>

<? 
 if(($_SESSION[$perfilusu])=="GERENTE FINANCEIRO") {
 

include "conecta.php";

$escolha=$_GET['escolha']; ?>


Tipo de impressao:


<select name='select' size=1 value='2' onChange='getStates(this);'>";
<option value=''>-- SELECIONE UMA OPÇÃO --</option>";
<option value='1' <? if ($escolha=='1') {echo "selected='selected'";} ?> > HTML </option>
<option value='2' <? if ($escolha=='2') {echo "selected='selected'";} ?> > PDF </option>
</select>
<?
//fazer onclick para atualizar quando for selecionado



switch($escolha) {
//------------------------------------------------------
case '01': // imprime relatorio de movimentacoes financeiras de departamento por Beneficiado em html


	
	$sql="SELECT * FROM movimentacao, funcdepto,categoria WHERE beneficiado=cod_funcdepto AND movimentacao.categoria=categoria.cod_categoria ORDER BY data_movimentacao,beneficiado"; 

    	
	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a consulta dos departamentos, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico. ".mysql_error());



    echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=300>Beneficiado</th>"; // th -> coluna
	
	echo "<th width=100>Valor </th>";
    echo "<th width=50>Categoria</th>";
    echo "<th width=200>Departamento</th>";
    echo "<th width=100>Data</th>";
    echo "<th width=200>Operacao</th>";



	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	
		$campo0=$linha["funcionario"]; 
				
		$campo1=$linha["valor"]; 
		$campo2=$linha["natureza"];   
		$campo3=$linha["departamento"]; 
		$campo4=$linha["data_movimentacao"];   
		$campo5=$linha["estado_operacao"]; 


		
		echo "<tr>"; // row = linha
		
		echo "<th width=300>$campo0&nbsp;</th>";  
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=50>$campo2&nbsp;</th>";
		echo "<th width=200>$campo3&nbsp;</th>";  
		echo "<th width=100>$campo4&nbsp;</th>";
		echo "<th width=200>$campo5&nbsp;</th>";
		
		echo "</tr>";
		
		}
		
	   echo "</table>";


	break;
	
//-----------------------------------------------------
case '02':// imprime em pdf

echo "<form action='relatoriopdf.php' method='post'>";


	$sql="SELECT * FROM movimentacao, funcdepto,categoria WHERE beneficiado=cod_funcdepto AND movimentacao.categoria=categoria.cod_categoria ORDER BY data_movimentacao,beneficiado"; 

    	
	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a consulta dos departamentos, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico. ".mysql_error());



    echo "<table with=740 border=1 cellpading=1 cellspacing=1";
	echo "<tr>";  // row --> linha
	
	echo "<th width=300>Beneficiado</th>"; // th -> coluna
	
	echo "<th width=100>Valor </th>";
    echo "<th width=50>Categoria</th>";
    echo "<th width=200>Departamento</th>";
    echo "<th width=100>Data</th>";
    echo "<th width=200>Operacao</th>";



	echo "</tr>";

	
	while ($linha=mysql_fetch_array($resultado)){
	
		$campo0=$linha["funcionario"]; 
				
		$campo1=$linha["valor"]; 
		$campo2=$linha["natureza"];   
		$campo3=$linha["departamento"]; 
		$campo4=$linha["data_movimentacao"];   
		$campo5=$linha["estado_operacao"]; 


		
		echo "<tr>"; // row = linha
		
		echo "<th width=300>$campo0&nbsp;</th>";  
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=50>$campo2&nbsp;</th>";
		echo "<th width=200>$campo3&nbsp;</th>";  
		echo "<th width=100>$campo4&nbsp;</th>";
		echo "<th width=200>$campo5&nbsp;</th>";
		
		echo "</tr>";
		
		}
		
	   echo "</table>";
		
		echo "<input type='hidden' name='opcao' value='13' >";//envia valor para relatoriopdf.php 
	    echo "<input name='submit' type='submit' value='PDF'/>";
	    echo "</form>";
		
break;
	
//------------------------------------------------------
	
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
<p><a href="/sysco/MenuGerente.php" target="_parent"><div align="center" class="copyright">Voltar</div></a></p>
</body>
</html>
