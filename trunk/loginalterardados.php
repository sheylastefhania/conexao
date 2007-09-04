<html>
<head> 
<title> Login  </title>
</head>
<body> 
<h1>:: Login </h1>

<form action="validaloginaltera.php" method="POST">
    Entre com o usuario e senha:<br><br>
	
	Usuário : <br> <input name="usuario" type="text" size="30"><br>
	Senha   : <br> <input name="password" type="password" size="30"><br>
    

	
<input name="enviar" type="submit" id="enviar" value="Alterar">
</form>


<form action="logout.php" method="POST">


<input name="enviar" type="submit" id="enviar" value="Logoff">
</form>

<form action="index.php" method="POST">


<input name="enviar" type="submit" id="enviar" value="Cancelar">
</form>


</body>
</html>