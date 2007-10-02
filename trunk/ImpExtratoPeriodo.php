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
document.location=('ImpExtratoPeriodo.php?escolha=' + escolha);
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

case '01': // HTML 

		echo "<form action='exibir.php' method='post'>";
	
//SELECT DA CONTA

	echo "Selecione Conta:  ";
	echo "<select name='verconta2' >";  // valor onde sera armazenado o valor escolhido
	
	$sql=mysql_query("SELECT * FROM CONTA") or die ("Houve erro na selecao da tabela");
	
	echo "<option value=''>-- SELECIONE--</option>";

	while ($linha=mysql_fetch_array($sql)) {
	
	    $codigo=$linha['cod_conta']; 
		$campoconta=$linha['nome'];
		
	    echo "<option value='$campoconta'>$campoconta</option>"; 
	}						   

		echo "</select><br>";
	    echo "<br>";

		
// Select da data inicial
		
				
		echo "Data Inicial: <select name='data1'>"; // esse valor e o que sera enviado para  confirma
	
				
		$sql="SELECT DISTINCT data_movimentacao FROM movimentacao ORDER BY data_movimentacao ";
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		   	while ($linha=mysql_fetch_array($sql)){
				$campo1novo=$linha["data_movimentacao"];
				
				echo "<option value='$campo1novo'>$campo1novo</option>"; 
				}
		
		echo "</select><br>";
	    echo "<br>";
      
	  
//Select data final
	   
   		echo "Data Final: <select name='data2'>"; // esse valor e o que sera enviado para  confirma

	   
	   $sql="SELECT DISTINCT data_movimentacao FROM movimentacao ORDER BY data_movimentacao DESC ";
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		while ($linha=mysql_fetch_array($sql)){
				$campo2novo=$linha["data_movimentacao"];
				
				echo "<option value='$campo2novo' >$campo2novo</option>"; 
				}
		
		echo "</select><br>";
	    echo "<br>";
 
    	echo "<input type='hidden' name='opcao' value='8' >";//envia valor para exibir.php 
	    echo "<input name='submit' type='submit' value='HTML'/>";
	    echo "</form>";	
	



break;
	
//-----------------------------------------------------
case '02':// imprime em pdf

echo "<form action='relatoriopdf.php' method='post'>";

$sql=mysql_query("SELECT * FROM conta ") or die ("Houve erro na selecao da tabela");
echo "Selecione Conta:  ";
echo "<select name='verconta2' >";  // valor onde sera armazenado o valor escolhido
echo "<option value=''> -- SELECIONE -- </option>";


	while ($linha=mysql_fetch_array($sql)) {
	
	    $codigo=$linha['cod_conta']; 
		$campoconta=$linha['nome'];
		
		    echo "<option value='$campoconta'>$campoconta</option>"; 
	}						   

		echo "</select><br>";
	    echo "<br>";

		
// Select da data inicial
		
				
		echo "Data inicial: <select name='data1'>"; // esse valor e o que sera enviado para  confirma
	
				
		$sql="SELECT DISTINCT data_movimentacao FROM movimentacao ORDER BY data_movimentacao ";
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		   	while ($linha=mysql_fetch_array($sql)){
				$campo1novo=$linha["data_movimentacao"];
				
				echo "<option value='$campo1novo'>$campo1novo</option>"; 
				}
		
		echo "</select><br>";
	    echo "<br>";
      
	  
//Select data final
	   
   		echo "Data Final: <select name='data2'>"; // esse valor e o que sera enviado para  confirma

	   
	    $sql="SELECT DISTINCT data_movimentacao FROM movimentacao ORDER BY data_movimentacao DESC ";
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		while ($linha=mysql_fetch_array($sql)){
				$campo2novo=$linha["data_movimentacao"];
				
				echo "<option value='$campo2novo' >$campo2novo</option>"; 
				}
		
		echo "</select><br>";
	    echo "<br>";
		
		echo "<form action='exibir.php' method='post'>";
  
    	echo "<input type='hidden' name='opcao' value='8' >";//envia valor para relatoriopdf.php 
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
