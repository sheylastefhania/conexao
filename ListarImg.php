<html>
<head>
<title>SYSCO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<?
$d = dir("Fotos/");
$files="Fotos/";
while ($entrada_arq=$d->read())
	{
		if ($entrada_arq <> '.' and entrada_arq <>'.')
		   
		   {
		   $quantos = strlen($entrada_arq);
		   
		   $item=$quantos-3;
		   $ext= $entrada_arq[$item];
		   
		   $item=$quantos-2;
		   $ext= $ext.$entrada_arq[$item];
		   
		   $item=$quantos-1;
		   $ext= $ext.$entrada_arq[$item];
		   
		   
		if($ext=='jpg')
			{
			  echo '<img src="';
			  echo $files.$entrada_arq.'"><BR>';
			 }
		   }
		  }
		 $d->close;  
		   
		?>   
</body>
</html>