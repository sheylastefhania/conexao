<html>
<head>
<title>Confirma&ccedil;&atilde;o de Transfer&ecirc;ncia de Saldo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<div align="center" class="td_title">Confirma&ccedil;&atilde;o de Transfer&ecirc;ncia de Saldo</div>
<?php

    echo "<form action='confirmaTransferencia.php' method='post'>";
	
	echo "Conta de origem  : <input name='contaOrigem'  value='$contaOrigem'  type='text' size=30 ><br><br>";
	
	echo "Conta de destino : <input name='contaDestino' value='$contaDestino'   type='text' size=30 ><br><br>";

	echo "Valor  : <input name='saldo' value='$saldo'    type='text' size=30 ><br><br>";

	echo"<br>";
	
    echo "<input name='submit' type='submit' value='Confirmar'/>";
	
    echo "</form>";
   
		
	// BOTAO para retornar ao cadastro de usuarios
	
    echo "<form action='transferesaldo.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>";
	
	echo "</form>";
	
?>
</body>
</html>