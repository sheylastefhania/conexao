<?php

    echo "<form action='confirma.php' method='post'>";
	
	echo "Funcionario selecionado  : <input name='tipo' value='$tipo'  type='text' size=30 ><br>";
	
	echo "E-mail  :   <input name='email' value='$email'   type='text' size=30 ><br>";

	echo "Login: : <input name='login' value='$login'    type='text' size=30 ><br>";

 	
	echo "Senha : <input name='password' value='$password' type='password' size=30 ><br>"; 
	echo"<br>";
	
	echo "<input type='hidden' name='opcao' value='1' >"; // VAI PASSAR OPÇÃO COM O VALOR 1 para  o case do confirma
    echo "<input name='submit' type='submit' value='Confirmar'/>";
	
    echo "</form>";
   
		
	// BOTAO para retornar ao cadastro de usuarios
	
    echo "<form action='cadastrausuario.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>";
	
	echo "</form>";
	
?>