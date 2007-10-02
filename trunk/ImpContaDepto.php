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
document.location=('ImpContaDepto.php?escolha=' + escolha);
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
<br>
<?
//fazer onclick para atualizar quando for selecionado



switch($escolha) {
//------------------------------------------------------

case '01': // imprime relatorio acesso por usuario por data em html

$sql="SELECT conta.nome AS nomeconta,saldo,conta.cod_depto,departamento.cod_depto,departamento.nome AS nomedepto FROM conta,departamento WHERE conta.cod_depto=departamento.cod_depto ORDER BY departamento.nome";


//$sql= "SELECT DISTINCT data_movimentacao FROM movimentacao ORDER BY data_movimentacao";

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
	
//-----------------------------------------------------
case '02':// imprime em pdf


//session_start();
//header ("Location: relatoriopdf.php");



echo "<form action='relatoriopdf.php' method='post'>";


      echo "<input type='hidden' name='opcao' value='9' >";	//opcao enviada a relatoriopdf.php 
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
