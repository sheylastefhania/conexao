<?
// Dados informados pelo usu�rio atrav�s de um formul�rio
// E-mail de destino:
$email_para = "chrystiane2000@yahoo.com.br";
// Assunto do e-mail:
$email_assunto = "Ol�, sou uma nova mensagem!";
// Conte�do da mensagem em formato html
$email_conteudo = "
<html>
<body>
Oi! Eu sou um <b>e-mail</b> em formato HTML!
</body>
</html>";
// E-mail de quem enviou:
$email_de = "bush@whitehouse.gov";
// Cabe�alhos que definem o e-mail como sendo em formato HTML
$cabecalho = "MIME-Version: 1.0rn";
$cabecalho .= "Content-type: text/html; charset=iso-8859-1rn";
$cabecalho .= "From:<$email_de>rn";

// Passando as vari�ves para a fun��o mail() realizar o envio
// Usando if else para demonstrar se o envio foi feito com sucesso
if (mail($email_para, $email_assunto, $email_conteudo, $cabecalho)) {
	echo "E-mail enviado com sucesso, parab�ns garoto!!!";
}
else {
	echo "Ocorreu um erro durante o envio do e-mail.";
}
?>