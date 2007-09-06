:: CONFIRMAÇÃO DE CADASTRO


<?php
     echo "<form action='confirma.php' method='post'>";
	
	
	echo "Nome          :  <input name='nome' value='$nome' type='text' size=30><br>";
	echo "CPF          :  <input name='cpf' value='$cpf' type='text' size=30><br>";
    echo "Logradouro   :  <input name='logradouro' value='$logradouro' type='text' size=30>";
	echo " Tipo Logradouro   :  <input name='tipolog' value='$tipolog' type='text' size=30>";
	echo " Numero          :  <input name='num' value='$num' type='text' size=30><br>";
	echo "Complemento          :  <input name='complemento' value='$complemento' type='text' size=30>";
	echo " Tipo Complemento          :  <input name='tipocomp' value '$tipocomp' type='text' size=30><br>";
	echo "Bairro          :  <input name='bairro' value= '$bairro' type='text' size=30><br>";
	echo "Cidade          :  <input name='cidade' value= '$cidade' type='text' size=30><br>";
	echo "Estado          :  <input name='estado' value= '$estado' type='text' size=30>";
	echo "  CEP           : <input name='cep' value= '$cep' type='text' size=30><br>";
	echo "Telefone          :  <input name='fone' value= '$fone' type='text' size=30>";
	echo "Tipo Telefone          :  <input name='tipofone' value= '$tipofone' type='text' size=30><br>";
	echo "Administrador          :  <input name='adm' value= '$adm' type='text' size=30><br>";
	
	echo "<input type='hidden' name='opcao' value='8' >"; // VAI PASSAR OPÇÃO COM O VALOR 8 para  o case do confirma
	
		echo "<input type='hidden' name='ativo' value='SIM' >";	 // enviar valor para ativar o funcionario

    echo "<input name='submit' type='submit' value='Confirmar'/>";
	
    echo "</form>";
	
?>