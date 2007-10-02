<html>
<head>
<title>Confirma&ccedil;&atilde;o de Cadastro de Memorando</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<div align="center" class="td_title">Confirma&ccedil;&atilde;o de Cadastro de Memorando</div>
  <?php

    echo "<form action='confirmaMemorando.php' method='post'>";
	
    echo "Descricao   : <input name='descricao' value='$descricao'    type='text' size=40 ><br><br>";

    echo "Numero      : <input name='numero' value='$numero'  type='text' size=30 ><br><br>";
	
	//echo "Imagem   : <input name='imagem' value='$imagemfinal'    type='text' size=30 ><br>";

	echo"<br>";
	
    echo "<input name='submit' type='submit' value='Confirmar'/>";
	
    echo "</form>";
   
		
	// BOTAO para retornar ao cadastro de usuarios
	
    echo "<form action='cadastraMemorando.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>";
	
	echo "</form>";
	
?>
</p>
</body>
</html>