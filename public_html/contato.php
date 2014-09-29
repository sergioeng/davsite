<?php include('incs/topo.php');?>

	<h1>Contato</h1>
    <p><span class="bold_dark">(21) 3629-3337</span><br />
	<a class="link" href="mailto:contato@softlaser.com.br" alt="contato@softlaser.com.br">contato@softlaser.com.br</a></p>
	<p>Envie-nos uma mensagem com suas dúvidas e sugestões. A <span class="bold_dark">SoftLaser</span> tem o maior prazer em considerar cada cliente um importante parceiro.</p>

	<script language="javascript" type="text/javascript">
				<!--
				function validaCad_contato() {
					if((document.form_contato.nome.value.length < 3)) {
						alert('Insira seu nome.');
						document.form_contato.nome.focus();
						return false;
					}
					if(document.form_contato.email.value.length < 7 || (document.form_contato.email.value.indexOf('@') == -1  || document.form_contato.email.value.indexOf('.') == -1) ) {
						alert('Informe um endereço de e-mail válido.');
						document.form_contato.email.focus();
						return false;
					}
					if((document.form_contato.telefone.value.length <= 10) || (document.form_contato.telefone.value == '00 0000-0000')) {
						alert('Insira um telefone válido no formato 00 0000-0000.');
						document.form_contato.telefone.focus();
						return false;
					}					
									
					if(document.form_contato.assunto_contato.value.length < 3) {
						alert('Insira um assunto.');
						document.form_contato.assunto_contato.focus();
						return false;
					}
					if((document.form_contato.msg.value.length <= 2)) {
						alert('Escreva sua mensagem.');
						document.form_contato.msg.focus();
						return false;
					}					
										
				}
				-->
			</script>
          
            <form id="form_contato" name="form_contato" method="post" action="contato_ok.php" onsubmit="return validaCad_contato()">
						<table>
  							<tr>
    							<td class="contato">NOME*:</td>
   							  <td><input name="nome" type="text" class="text" id="nome" /></td>
					  	  </tr>
  							<tr>
    							<td class="contato">E-MAIL*:</td>
    							<td><input name="email" type="text" class="text" id="email" /></td>
  							</tr>
                            <tr>
    							<td class="contato">TELEFONE*:</td>
   							  <td><input name="telefone" type="text" class="text" id="telefone" value="00 0000-0000" onfocus="if(this.value=='00 0000-0000')this.value='';" onblur="if(this.value=='')this.value='00 0000-0000';" /></td>
                            </tr>
  							<tr>
    							<td class="contato">ASSUNTO*:</td>
    							<td><input name="assunto_contato" type="text" class="text" id="assunto_contato" /></td>
  							</tr>
  							<tr>
    							<td class="contato">MENSAGEM*:</td>
    							<td><textarea name="msg" rows="5" cols="33" id="msg"></textarea></td>
  							</tr>
  							<tr>
                            	<td height="41"><input name="protect" type="hidden" id="protect" value="true" /></td>
   							    <td><input name="enviar" type="submit" class="submit" id="enviar" value="Enviar" /></td>
						  </tr>
                          <tr>
                          		<td></td>
                                <td></td>
                          </tr>
                          <tr>
                          		<td></td>
                                <td class="contato">* Campos obrigatórios.</td>
                          </tr>
						</table>
		  </form>
          
          <br /><br />
          <img src="images/endereco.jpg"  />
<?php include('incs/bottom.php');?>