<html>
<head>
<title>Confirma&ccedil;&atilde;o de Cadastro</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<?php
   echo "<form action='confirma.php' method='post'>";
	
	
	echo "Nome :  <input name='nome' type='text'  value='$nome'  READONLY size=30><br><br>";
	echo "Sigla :  <input name='sigla' type='text' value='$sigla' READONLY size=30><br><br>";
    echo "Ativo :  <input name='ativo' type='text' value='$ativo' READONLY size=30><br><br>";
	
	
	
	
	echo "<input type='hidden' name='opcao' value='13' >"; // VAI PASSAR OPÇÃO COM O VALOR  para  o case do confirma
	
		echo "<input type='hidden' name='ativo' value='SIM' >";	 // enviar valor para ativar o funcionario

    echo "<input name='submit' type='submit' value='Confirmar'/>";
	
    echo "</form>";
	
?>
</body>
</html>