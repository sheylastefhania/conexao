<? @session_start();?>

<html>
<head>
<title>SYSCO</title>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<?

    
    echo "<form action='confirma.php' method='post'>";
    echo ":: CONFIRMAÇÃO DE ENVIO DE SENHA<br><br><br>";
	echo "USUARIO   :     ";
	
	echo $_SESSION[usuario];
	echo "<br>";
	echo "<br>";
		
	          
	$email2=$_SESSION[email1]; 
	$id=$_SESSION[codigo];  
	
	echo "<br>";
	echo "<br>";
		
	echo "<input type='hidden' name='opcao' value='21' >"; // VAI PASSAR OPÇÃO o case do confirma
	echo "<input type='hidden' name='email2' value='$email2' >"; 
	echo "<input type='hidden' name='id' value='$id' >"; 

	
    echo "<input name='submit' type='submit' value='Confirmar'/>";
	
    echo "</form>";
   

	// BOTAO para retornar para index
	
    echo "<form action='index.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Cancelar'/>";
	
	echo "</form>";
echo $email2;
	
?>


