<html>
<head>
<title>Confirma&ccedil;&atilde;o de Cadastro de Conta</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<div align="center" class="td_title">Confirma&ccedil;&atilde;o de Cadastro de Conta</div>

<?php
 	echo "<br>";
    echo "<form action='confirmaConta.php' method='post'>";
	
	echo "Nome da Conta  : <input name='nome' value='$nome'  type='text' size=30 ><br><br>";
	
	echo "Saldo          : <input name='saldo' value='$saldo'   type='text' size=30 ><br><br>";

	echo "Departamento   : <input name='depto' value='$depto'    type='text' size=30 ><br><br>";

	echo"<br>";
	
	echo "<input type='hidden' name='opcao' value='1' >"; // VAI PASSAR OPÇÃO COM O VALOR 1 para  o case do confirma
    echo "<input name='submit' type='submit' value='Confirmar'/>";
	
    echo "</form>";
   
		
	// BOTAO para retornar ao cadastro de usuarios
	
    echo "<form action='cadastrausuario.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>";
	
	echo "</form>";
	
?>
</body>
</html>