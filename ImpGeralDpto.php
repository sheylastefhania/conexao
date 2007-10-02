<? session_start();?>
<html>
<head>
<title>Relat&oacute;rios</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>

<Script Language="JavaScript">
function getStates(what) {
if (what.selectedIndex != '') {
var escolha = what.value;
document.location=('ImpGeralDpto.php?escolha=' + escolha);
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
case '01': // imprime relatorio em html


	
	$sql="SELECT * FROM funcao ORDER BY cod_dpto"; 

    	
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


	break;
	
//-----------------------------------------------------
case '02':// imprime em pdf

echo "<form action='relatoriopdf.php' method='post'>";


	$sql="SELECT * FROM funcao ORDER BY cod_dpto"; 
    	
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
		
		echo "<input type='hidden' name='opcao' value='5' >";//envia valor para relatoriopdf.php 
	    echo "<input name='submit' type='submit' value='Buscar'/>";
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
