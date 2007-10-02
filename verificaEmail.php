<html>
<head>
<title>SYSCO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>

<body>
<?

$email="teste@teste.com";
function verifica_mail($mail){
list($user,$domain)=split("@",$mail,2);
if (checkdnsrr($domain,"MX")){
return true;
}
else{
return false;}
}

verifica_mail($email);

?>

</body>
</html>
