<?php include('conn/conn.php'); ?>
<?php $vTitulo = "Cadastro de Usuários Administrativos"; ?>
<?php include('incs/topo-adm.php'); ?>
       
<h1>Cadastro de Usuários Administrativos</h1>
		<div id="submenu">
		  <a href="usuario_inserir.php">Cadastrar Novo Usuário</a>
    	  <a href="usuario_alterar.php">Alterar ou Excluir Usuário</a></div>
		<!--submenu-->         

	<script language="javascript" type="text/javascript">
	<!--

	function validaCadUs() {
		if(document.cad_usuario.nome_usu.value.length < 2) {
			document.getElementById('mensagem').innerHTML='Informe um nome.';
			document.cad_usuario.nome_usu.focus();
			return false;
		}
		if(document.cad_usuario.login_usu.value.length < 5) {
			document.getElementById('mensagem').innerHTML='Informe um login de pelo menos 5 dígitos.';
			document.cad_usuario.login_usu.focus();
			return false;
		}
		if(document.cad_usuario.senha_usu.value.length < 5) {
			document.getElementById('mensagem').innerHTML='A senha deve ter pelo menos 5 dígitos.';
			document.cad_usuario.senha_usu.focus();
			document.cad_usuario.senha_usu.value = "";
			document.cad_usuario.conf_senha_usu.value = "";
			return false;
		}
		if(document.cad_usuario.senha_usu.value != document.cad_usuario.conf_senha_usu.value) {
			document.getElementById('mensagem').innerHTML='As senhas não conferem.';
			document.cad_usuario.senha_usu.focus();
			document.cad_usuario.senha_usu.value = "";
			document.cad_usuario.conf_senha_usu.value = "";
			return false;
		}
	}
	-->
	</script>

	<p class="destaque" id="mensagem"><?php echo @$_SESSION['msg_status']; ?></p>
	<?php @$_SESSION['msg_status'] = ''; ?>
    
<div id="form_bug">
	<form id="cad_usuario" name="cad_usuario" action="usuario_inserir_inclui.php" method="post" onsubmit="return validaCadUs()">
		<table class="table_geral">
<tr>
    			<td class="contato2">Nome*:</td>
   			<td><input type="text" name="nome_usu" id="nome_usu" class="text_medio"/></td>
   		  </tr>
  			<tr>
    			<td class="contato2">Login*:</td>
    			<td><input type="text" name="login_usu" id="login_usu" class="text_curto"/></td>
    		</tr>
  			<tr>
    			<td class="contato2">Senha*:</td>
    			<td><input name="senha_usu" type="password" class="text_curto" id="senha_usu" /></td>
    		</tr>
		  	<tr>
    			<td class="contato2">Confirme a Senha*:</td>
    			<td><input name="conf_senha_usu" type="password" class="text_curto" id="conf_senha_usu" /></td>
    		</tr>
  			<tr>
    			<td><input name="protect" type="hidden" id="protect" value="true" /></td>
    			<td><input id="entrar" name="entrar" type="submit" class="submit" value="Cadastrar" /></td>
  			</tr>
		</table>
	</form>
</div>
<?php
	@$_SESSION['msg_status'] = "";
?>

<?php include('incs/bottom.php'); ?>