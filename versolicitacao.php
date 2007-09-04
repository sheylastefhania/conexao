<?php
include "conecta.php";
$sql= "SELECT * FROM usuario WHERE login = '$login' ";

$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a execução desta operação, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico. ");

$achou=mysql_num_rows($resultado);

if ($achou > 0)
{
  echo "<i>O login informado encontra-se em uso no sistema...</i>";

}
elseif (empty($tipo) or empty($login) or empty($email) or empty($password))
 { // verifica se os campos estão em branco
      echo "<i>Existe campos não preenchido. Por favor, indique um valor.</i>";
 
 }
elseif ($password<>$password2)
{
     echo "<i>A confirmação da senha não confere com a senha...</i>";
	 
}
else	
{
    echo "<form action='confirma.php' method='post'>";

  echo "<i>Seu cadastro foi aprovado. Por favor, confirme seus dados.</i>";
	
	echo "Funcionario selecionado  : <input name='tipo' value='$tipo'  type='text' size=30 ><br>";
	
	echo "E-mail  :   <input name='email' value='$email'   type='text' size=30 ><br>";

	echo "Login: : <input name='login' value='$login'    type='text' size=30 ><br>";

 	
	echo "Senha : <input name='password' value='$password' type='password' size=30 ><br>"; 
	echo"<br>";
	echo "<input type='hidden' name='password2' value='$password2' >";
	echo "<input type='hidden' name='opcao' value='7' >"; // VAI PASSAR OPÇÃO COM O VALOR 7 para  o case do confirma
    echo "<input name='submit' type='submit' value='Confirmar'/>";
	
    echo "</form>";
}   
		
	// BOTAO para retornar ao cadastro de usuarios
	
    echo "<form action='solicitaracesso.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>";
	
	echo "</form>";


?>