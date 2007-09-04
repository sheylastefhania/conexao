<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	color: #C0C0C0;
}
body {
	background-image: url();
}
-->
</style>

<table border="0" width="80%" colspacing ="0"  align="center">

  <tr>
    <td width="740" height="60" bordercolor="#D4D0C8" bgcolor="#003333"><div align="center" class="style1">SYSCO</div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="/sysco/solicitaracesso.php" title="Solicitar Acesso" target="_blank">SOLICITAR ACESSO </a></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <div align="center"><a href="/sysco/login.php" target="_blank">LOGAR</a></div>
    </div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="/sysco/loginalterardados.php" target="_blank">ALTERAR DADOS CADASTRAIS </a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="/sysco/solicitasenha.php" target="_blank">ESQUECEU A SENHA </a></div></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#009999"><div align="center"><a href="/veiculo/login.php" target="_blank"></a>
      <?
	$mes= date('n');
	switch ($mes)
	{
		case 1: $mes = 'Janeiro'; break;
		case 2: $mes = 'Fevereiro'; break;
		case 3: $mes = 'Março'; break;
		case 4: $mes = 'Abril'; break;
		case 5: $mes = 'Maio'; break;
		case 6: $mes = 'Junho'; break;
		case 7: $mes = 'Julho'; break;
		case 8: $mes = 'Agosto'; break;
		case 9: $mes = 'Setembro'; break;
		case 10: $mes = 'Outubro'; break;
		case 11: $mes = 'Novembro'; break;
		case 12: $mes = 'Dezembro'; break;
	}
	
	$dia = date('d');
	$ano = date('Y');
	echo '<p align = "center">';
	    echo '<font style = "Tahoma" color= "#C0C0C0" size =4>';

    echo '<p align = "center">';
		echo '<font style = "Tahoma" color= "#000000" size =2>';
	
	echo 'Hoje : '.$dia.' / '.$mes.' / '.$ano.' </p> </font>';	

		
	?>
    </div></td>
  </tr>
</table>
