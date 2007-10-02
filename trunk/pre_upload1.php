<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>


<body>
<p><div align="center" class="fsflink">Envio de fotos para o memorando de c&oacute;digo :<strong><?php echo $HTTP_GET_VARS['cod_memo2']; ?></strong> </div> </p>
<p><div align="left" class="trans"><a href="javascript:;" onClick="MM_openBrWindow('upload_foto1.php?cod_prod=<?php echo $HTTP_GET_VARS['cod_memo']; ?>&num_foto=0','','scrollbars=yes,width=500,height=400')">Enviar 
  foto pequena</a></div></p>
<p><div align="left" class="trans"><a href="javascript:;" onClick="MM_openBrWindow('upload_foto1.php?cod_prod=<?php echo $HTTP_GET_VARS['cod_memo']; ?>&num_foto=1','','scrollbars=yes,width=500,height=400')">Enviar 
  foto grande 1</a></div></p>
<p><div align="left" class="trans"><a href="javascript:;" onClick="MM_openBrWindow('upload_foto1.php?cod_prod=<?php echo $HTTP_GET_VARS['cod_memo']; ?>&num_foto=2','','scrollbars=yes,width=500,height=400')">Enviar 
  foto grande 2</a></div></p>
<p><div align="left" class="trans"><a href="javascript:;" onClick="MM_openBrWindow('upload_foto1.php?cod_prod=<?php echo $HTTP_GET_VARS['cod_memo']; ?>&num_foto=3','','scrollbars=yes,width=500,height=400')">Enviar 
  foto grande 3</a></div></p>
</body>
</html>
<?
echo "<br>";
echo  $cod_memo;
?>