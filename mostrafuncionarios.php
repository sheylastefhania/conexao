<html>
<head>
<title>SYSCO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<?
//VERIFICA SE USUARIO ESCOLHEU ALGUM NUMERO
include "conecta.php";
include "menuAdm.php";

if (isset($_POST["numeros"]))
{	
	echo "Os numeros de sua preferencia sao :<BR>";
	
	//faz o looop pelo array dos numeros
	foreach($_POST["numeros"] as $numero)
	{
		$sql="INSERT INTO teste (numero,ativo) VALUES ('$numero','SIM')";
		
		$sql=mysql_query($sql) or die ("Ocorreu uma falha durante o cadastro dos dados do novo administrador, por favor, tente novamente. Caso o problema se repita, por favor, verifique os arquivos de log para rastrear a excecao." );
	
		//	echo "_".$numero."<BR>";
		echo $numero;
		echo"<br>";
			
		}
}
else
{
	echo "Voce nao escolheu oa numeros!<br>";
}		

//verifica se o usuario npode receber newsletter
if(isset($_POST["news"]))
{
 echo"Voce deseja receber newsletter por e-mail ! ! !";
}
else
{
echo "Voce nao quer receber newsletter por email ! ! !";
}
	
?>
</body>
</html>