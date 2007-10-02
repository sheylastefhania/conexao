<html>
<head>
<title>Confirma&ccedil;&atilde;o de Movimenta&ccedil;&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<div align="center" class="td_title">Confirma&ccedil;&atilde;o de Movimenta&ccedil;&atilde;o</div>

<?php

    echo "<form action='confirmaMovimentacao.php' method='post'>";
	
	echo "Valor  : <input name='valor' value='$valor'  type='text' size=30 ><br>";
	
	echo "Categoria  : <input name='categoria' value='$categoria'  type='text' size=1 ><br>";
	
	echo "Beneficiado : <input name='beneficiado' value='$beneficiado'   type='text' size=30 ><br>";

	echo "Descricao   : <input name='descricao' value='$descricao'    type='text' size=40 ><br>";
	
	
    echo "<input name='submit' type='submit' value='Confirmar'/>";
	
    echo "</form>";
   
		
	// BOTAO para retornar ao cadastro de movimentacao
	
    echo "<form action='cadastraMovimentacao.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>";
	
	echo "</form>";
	
?>
</body>
</html>