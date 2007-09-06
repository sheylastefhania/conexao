<?
    session_start();
	include "conecta.php";
//	echo $id;
$sql= "SELECT cod_usuario,cod_func,login,senha,email FROM usuario WHERE login = '$usuario'";
	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a consulta dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico".mysql_error());
	
	echo "<br>";
	echo "<br>";
	echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
	echo "<tr>";  // row --> linha
	echo "<th width=100>Código do Usuario</th>"; // th -> coluna
	echo "<th width=100>Funcionario</th>";
	echo "<th width=100>Login</th>";
    echo "<th width=100>Email</th>"; // nao mostrar senha, recadastrar senha se usuario esqueceu
	echo "<th width=50>Editar</th>";
	
	echo "</tr>";

	$option=9; // parâmetro usado na pagina de confirmação
	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_usuario"]; // campo chave de busca
				
		$campo1=$linha["cod_func"]; // campo1
		$campo2=$linha["login"];    //campo2
		$campo3=$linha["senha"];    //campo3
		$campo4=$linha["email"];    //campo4
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=100>$campo4&nbsp;</th>";

		echo "<th width=50><a href='editar.php?opcao=$option&id=$codigo'>Editar</a><br></th>";

		echo "</tr>";
		echo "<br>";
		}
		
	echo "</table>";
	?>