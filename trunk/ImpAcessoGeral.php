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
document.location=('impAcessoGeral.php?escolha=' + escolha);
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
case '01': // imprime relatorio geral em html

echo "<form action='exibir.php' method='post'>";


   echo "<input type='hidden' name='opcao' value='6' >";	//opcao enviada para relatoriopdf.php 
	   
   echo "<input name='submit' type='submit' value='HTML'/>";
   
   
 echo "</form>";	

	

	break;
	
//-----------------------------------------------------
case '02':// imprime em pdf

echo "<form action='relatoriopdf.php' method='post'>";


   echo "<input type='hidden' name='opcao' value='3' >";	//opcao enviada para relatoriopdf.php 
	   
   echo "<input name='submit' type='submit' value='Imprimir'/>";
	
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
