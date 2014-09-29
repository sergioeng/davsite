<?php include("incs/topo.php")?>

    <h1>Contato</h1>
    
            <?php
	$protect     = trim(str_replace("'","",$_POST['protect']));
	if($protect != "true") exit;
	
	$nome       = trim(str_replace("'","",$_POST['nome']));
	$email       = trim(str_replace("'","",$_POST['email']));
	$telefone       = trim(str_replace("'","",$_POST['telefone']));
	$assunto_contato       = trim(str_replace("'","",$_POST['assunto_contato']));
	$msg       = trim(str_replace("'","",$_POST['msg']));
	
	if ($nome == "" || $email == "" || $telefone == "" || $assunto_contato == "" || $msg == "") {			 
		$frase = "Não foi possível enviar a mensagem. Preencha todos os campos obrigatórios.<br /><br /><a href='javascript:history.go(-1)' class='bt_saiba_mais_promo'>Voltar</a>";	
	} else {			
		
		$de = "contato@softlaser.com.br";
		
		//$para = "redacao@piereti.com";
		$para = "contato@softlaser.com.br";	
					
		$assunto = "Contato feito pelo site www.softlaser.com.br";
		$mensagem = "<p><font face='Verdana' size='2'>O contato abaixo preencheu o formulário de contato do site.</font></p>";
		$mensagem = $mensagem . "<p><font face='Verdana' size='2'><strong>Nome:</strong> $nome </font><br />";
		$mensagem = $mensagem . "<font face='Verdana' size='2'><strong>E-mail:</strong> $email </font><br />";
		$mensagem = $mensagem . "<font face='Verdana' size='2'><strong>Telefone:</strong> $telefone </font><br />";
		$mensagem = $mensagem . "<font face='Verdana' size='2'><strong>Assunto:</strong> $assunto_contato </font><br />";
		$mensagem = $mensagem . "<font face='Verdana' size='2'><strong>Mensagem:</strong> $msg </font></p>";
							
		$headers = "MIME-Version: 1.0 \n";
		$headers .= "Content-Type: text/html; charset=utf-8 \n";
		$headers .= "Return-Path: $de \r\n";
		$headers .= "From: $de \r\n";
		$headers .= "Reply-To: $de \r\n";
				
		//mail ($para, $assunto, $message, $headers);	
		if(!mail($para, $assunto, $mensagem, $headers ,"-r".$de)){ // Se for Postfix
		$headers .= "Return-Path: $de \r\n"; // Se "não for Postfix"
		mail($para, $assunto, $mensagem, $headers);
		}
				
		$frase = "Mensagem enviada com sucesso. Agradecemos o interesse! Em breve, entraremos em contato.<br />";
	}				
?>
<p><?php echo $frase;?></p>
<br />  


<?php include("incs/bottom.php");?>