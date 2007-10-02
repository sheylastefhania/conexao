<? session_start();?>
<html>
<head>
<title>Relat&oacute;rio de Usu&aacute;rios por Departamento</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">

<Script Language="JavaScript">
function getStates(what) {
if (what.selectedIndex != '') {
var estado = what.value;
document.location=('relatoriousuariodp.php?estado=' + estado);
}
}

</Script>
</head>

<body>
<p>
<? 
  
if(($_SESSION[$perfilusu])=="GERENTE FINANCEIRO") {

include "conecta.php";

$estado=$_GET['estado']; ?>
</p>
<p>Escolha a opera&ccedil;&atilde;o: 
  <select name='select' size=1 value='2' onChange='getStates(this);'>
    ";
<option value=''>-- SELECIONE ORDENAÇÃO --</option>";
<option value='1' <? if ($estado=='1') {echo "selected='selected'";} ?> > POR DEPARTAMENTO </option>
<option value='2' <? if ($estado=='2') {echo "selected='selected'";} ?> > GERAL AGRUPADO POR DPTO </option>

  </select>
</p>
<p>
  <?
//fazer onclick para atualizar quando for selecionado



switch($estado) {
//------------------------------------------------------
case '01': //  ordenado por departamento

include "ImpDpto.php";

break;
	
//------------------------------------------------------
case '02': // geral ordenado por departamento 

include "ImpGeralDpto.php";

	break;
	
//------------------------------------------------------

} //fim do switch case

}else{
  if ($_SESSION[$perfilusu]=="") {
   echo "<blockquote><blockquote><div align='center' class='fsflink'><i>Voce precisa estar logado para utilizar esta pagina...</i></div></blockquote></blockquote>";

}else{
   if ($_SESSION[$perfilusu]<>"GERENTE FINANCEIRO")

    echo "<blockquote><blockquote><div align='center' class='fsflink'><i>Voce precisa ter o perfil de gerente para utilizar esta pagina...</i></div></blockquote></blockquote>";
}

}

?>
</body>
</html>