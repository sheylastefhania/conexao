<html>
<head> 
<title> Login  </title>
</head>
<body> 
<h1>  >>-- Login --<< </h1>

<form action="validacao.php" method="POST">

	Usuário : <br> <input name="usuario" type="text" size="30"><br>
	Senha   : <br> <input name="password" type="password" size="30"> <br>
<input name="enviar" type="submit" id="enviar" value="Logar">
</form>


<form action="logout.php" method="POST">


<input name="enviar" type="submit" id="enviar" value="Logoff">
</form>

</form>


</body>
</html>