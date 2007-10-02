<?
// Dados informados pelo usuario atraves de um formulario
// E-mail de destino:
$email_para = "chrystiane2000@yahoo.com.br";
// Assunto do e-mail:
$email_assunto = "Sistema SYSCO - Recuperacao de senha!";
// Conteudo da mensagem em formato html
$email_conteudo = "Sua nova senha eh 123456";

// E-mail de quem enviou:
$email_de = "chrystianeribeiro@hotmail.com";

// Cabecalhos que definem o e-mail como sendo em formato HTML

$cabecalho = "MIME-Version: 1.0rn";
$cabecalho .= "Content-type: text/html; charset=iso-8859-1rn";
$cabecalho .= "From:<$email_de>rn";


// Passando as variaves para a funcao mail() realizar o envio
// Usando if else para demonstrar se o envio foi feito com sucesso

if (mail($email_para, $email_assunto, $email_conteudo, $cabecalho)) {
	echo "E-mail enviado com sucesso, parabens garoto!!!";
}
else {
	echo "Ocorreu um erro durante o envio do e-mail.";
}
?>