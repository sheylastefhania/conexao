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
document.location=('impressaoacessodata.php?escolha=' + escolha);
}
}

</Script>
<body>
<p>
<div align="center" class="td_title">Relat&oacute;rios</div><br>
<? 
  
include "conecta.php";

$escolha=$_GET['escolha']; ?>

</p>
<p>Escolha a impressao:



<select name='select' size=1 value='1' onChange='getStates(this);'>";
<option value=''>-- SELECIONE UMA OPÇÃO --</option>";
<option value='1' <? if ($escolha=='1') {echo "selected='selected'";} ?> > HTML </option>
<option value='2' <? if ($escolha=='2') {echo "selected='selected'";} ?> > PDF </option>
</select>
<?
//fazer onclick para atualizar quando for selecionado



switch($escolha) {
//------------------------------------------------------
case '01': // imprime relatorio acesso por usuario por data em html
	

	$sql= "SELECT * FROM acesso";
	
	$resultado=mysql_query($sql) or die (mysql_error());

	while ($linha=mysql_fetch_array($resultado)){
    
	    $codigo=$linha["cod_acesso"]; // campo chave de busca
				
		$campo1=$linha["usuario"]; // campo1
		$campo2=$linha["datacesso"];    //campo2
		$campo3=$linha["hora"];    //campo3
		$campo4=$linha["IP"];   
		
	}			
		echo "<form action='exibir.php' method='post'>";
		
		// Select da data inicial
		
		
		echo "Selecionar: <select name='data1'>"; // esse valor e o que sera enviado para  confirma
	
				
		$sql="SELECT DISTINCT datacesso FROM acesso ORDER BY datacesso ";
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		   	while ($linha=mysql_fetch_array($sql)){
				$campo1novo=$linha["datacesso"];
				
				echo "<option value='$campo1novo' >$campo1novo</option>"; 
				}
		
		echo "</select><br>";
	    echo "<br>";
      
	  
	   //Select data final
	   
   		echo "Selecionar: <select name='data2'>"; // esse valor e o que sera enviado para  confirma

	   
	   $sql="SELECT DISTINCT datacesso FROM acesso ORDER BY datacesso DESC ";
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		   	while ($linha=mysql_fetch_array($sql)){
				$campo2novo=$linha["datacesso"];
				
				echo "<option value='$campo2novo' >$campo2novo</option>"; 
				}
		
		echo "</select><br>";
	    echo "<br>";
	//	$option=9;
  
    	echo "<input type='hidden' name='opcao' value='1' >";//envia valor 1 para exibir.php 
	    echo "<input name='submit' type='submit' value='HTML'/>";
	
	    echo "</form>";	
	
	
	
    
	break;
	
//------------------------------------------------------
case '02': // imprime em pdf
	

	$sql= "SELECT * FROM acesso";
	
	$resultado=mysql_query($sql) or die (mysql_error());

	while ($linha=mysql_fetch_array($resultado)){
    
	    $codigo=$linha["cod_acesso"]; // campo chave de busca
				
		$campo1=$linha["usuario"]; // campo1
		$campo2=$linha["datacesso"];    //campo2
		$campo3=$linha["hora"];    //campo3
		$campo4=$linha["IP"];   
		
	}			
		echo "<form action='relatoriopdf.php' method='post'>";
		
		// Select da data inicial
		
		
		
		echo "Selecionar: <select name='data1'>"; // esse valor e o que sera enviado para  confirma
	
				
		$sql="SELECT DISTINCT datacesso FROM acesso ORDER BY datacesso ";
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		   	while ($linha=mysql_fetch_array($sql)){
				$campo1novo=$linha["datacesso"];
				
				echo "<option value='$campo1novo' >$campo1novo</option>"; 
				}
		
		echo "</select><br>";
	    echo "<br>";
      
	  
	   //Select data final
	   
   		echo "Selecionar: <select name='data2'>"; // esse valor e o que sera enviado para  confirma

	   
	   $sql="SELECT DISTINCT datacesso FROM acesso ORDER BY datacesso DESC ";
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		   	while ($linha=mysql_fetch_array($sql)){
				$campo2novo=$linha["datacesso"];
				
				echo "<option value='$campo2novo' >$campo2novo</option>"; 
				}
		
		echo "</select><br>";
	    echo "<br>";
		$option=9;
  
    	echo "<input type='hidden' name='opcao' value='1' >";//envia valor 1 para relatoriopdf.php 
	    echo "<input name='submit' type='submit' value='PDF'/>";
	
	    echo "</form>";	
	break;
	
//------------------------------------------------------

	
} //fim do switch case

?>
</p>
<p><a href="/sysco/MenuGerente.php" target="_parent"><div align="center" class="copyright">Voltar</div></a></p>
</body>
</html>
