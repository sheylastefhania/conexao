<html>
<head>
<title>Movimenta&ccedil;&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<blockquote><blockquote><blockquote>
<div align="center" class="td_title"><i>Inserindo imagem...</i><br><br>
As imagens devem estar no formato jpg e ter no maximo 100 Kb..</div></blockquote></blockquote></blockquote>
<form action="Mov_upload_foto2.php" method="post" enctype="multipart/form-data" name="form1">
  <input name="upload_imagem" type="file" id="upload_imagem">
  <br><br>
  <input name="cod_movimentacao" type="hidden" id="cod_movimentacao" value="<?php echo $HTTP_GET_VARS['cod_movimentacao']; ?>">
  <input name="imagem" type="hidden" id="imagem" value="<?php echo $HTTP_GET_VARS['imagem']; ?>">
<div align="center">  <input type="submit" name="Submit" value="Enviar"></div>
</form>
</body>
</html>
