<html>
<head><title>Hoje</title></head>
<body bgcolor="#e6e6e6" >
	
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
	    echo '<font style = "Tahoma" color= "#0000FF" size =4>';
	echo 'Hoje: </p> </font>';
    echo '<p align = "center">';
		echo '<font style = "Tahoma" color= "#0000FF" size =2>';
	
	echo $dia.' / '.$mes.' / '.$ano.' </p> </font>';	
	echo date('n');
		
	?>
	</body>
	</html>
	