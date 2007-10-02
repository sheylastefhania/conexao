<html>
<head>
<title>Confirma&ccedil;&atilde;o de Cadastro</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<body>
<p>
<div align="center" class="td_title">Confirma Associacao de Departamento</div><br><br>

<?php
    echo "<form action='confirma.php' method='post'>";
	
	echo "Departamento   :  <input name='depto' value='$depto' type='text' size=30 READONLY><br><br>";
	echo "Departamento Superior :  <input name='deptosup' value='$deptosup' type='text' size=30 READONLY><br><br>";
   
	
	echo "<input type='hidden' name='opcao' value='16' >"; // VAI PASSAR OPÇÃO COM O VALOR 16 para  o case do confirma
		

    echo "<input name='submit' type='submit' value='Confirmar Associacao'/>";
	
    echo "</form>";
	
?>
</body>
</html>