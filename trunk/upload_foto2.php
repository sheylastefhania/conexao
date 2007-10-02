<html>
<head>
<title>UpLoad Foto</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>

<?php require_once "conecta.php"; ?>
<?php
   $cod_memo = $HTTP_POST_VARS["cod_memo"];
   $imagem = $HTTP_POST_VARS["imagem"];

	list($width, $height) = getimagesize($_FILES['upload_imagem']['tmp_name']);



	if (!eregi("^image\/(pjpeg|jpeg|gif)$", $_FILES['upload_imagem']['type']))
	
	{      
     ?>
           <script language="javascript">
		   alert("Tipo de arquivo nao permitido!\nApenas JPG ou GIF.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}

	elseif($width > 600 || $height > 600)

    {
     ?>
           <script language="javascript">
		   alert("Imagem muito grande!\nTem que ter no maximo 600 X 120 pixels.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
    }

	elseif ($_FILES['upload_imagem']['size'] > 20000000)

	{
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter ate 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}

	else
	{
          $cripto = substr(md5(uniqid(time())), 0, 10);

          $imagem = $_FILES['upload_imagem']['name'];

          $imagem_final = $cripto.$imagem;

          move_uploaded_file($_FILES['upload_imagem']['tmp_name'],"fotos/".$imagem_final);

          $caminho_foto = $imagem_final;
	
    $alterar = "UPDATE memorando SET imagem = 'fotos/$caminho_foto' WHERE cod_memo ='$cod_memo'";
	
	$alterar=mysql_query($alterar) or die (mysql_error());	
	echo"<blockquote><blockquote><div align='center' class='fsflink'>Imagem Inserida com Sucesso!!</div></blockquote></blockquote>";

	}

?>

</body>
</html>