<?php include('conn/conn.php'); ?>
<?php $vTitulo = "Cadastro de Usuários Administrativos"; ?>
<?php include('incs/topo-adm.php'); ?>

	<h1>Cadastro de Usuários Administrativos</h1>
	<div id="submenu">
    	<a href="usuario_inserir.php">Cadastrar Novo Usuário</a>
    	<a href="usuario_alterar.php">Alterar ou Excluir Usuário</a></div><!--submenu-->
    
    <p class="destaque" id="mensagem"><?php echo @$_SESSION['msg_status']; ?></p><!--mensagem-->
		<?php @$_SESSION['msg_status'] = ''; ?>

	<script language="javascript" type="text/javascript">
	<!--

	function validaCad() {
		if(document.usuario_altera.change_nome.value.length < 2) {
			document.getElementById('mensagem').innerHTML='Informe um nome.';
			document.usuario_altera.change_nome.focus();
			return false;
		}
		if(document.usuario_altera.change_login.value.length < 5) {
			document.getElementById('mensagem').innerHTML='Informe um login de pelo menos 5 dígitos.';
			document.usuario_altera.change_login.focus();
			return false;
		}
		if(document.usuario_altera.change_senha.value.length < 5) {
			document.getElementById('mensagem').innerHTML='A senha deve ter pelo menos 5 dígitos.';
			document.usuario_altera.change_senha.focus();
			document.usuario_altera.change_senha.value = "";
			document.usuario_altera.conf_change_senha.value = "";
			return false;
		}
		if(document.usuario_altera.change_senha.value != document.usuario_altera.conf_change_senha.value) {
			document.getElementById('mensagem').innerHTML='As senhas não conferem.';
			document.usuario_altera.change_senha.focus();
			document.usuario_altera.change_senha.value = "";
			document.usuario_altera.conf_change_senha.value = "";
			return false;
		}
	}
	-->
	</script>
	
<?php

	$sql = "";
	$sql .= "SELECT * FROM tb_users ";
	$sql .= "ORDER BY user_name ASC";
	$consulta = mysql_query($sql);
	$linhas = mysql_num_rows($consulta);
	
	if($linhas == 0){
 		echo "Nenhum registro encontrado.";
 		exit();
	}
?>

<?php
	$id = $_GET["id"];     
    $sql = "";
	$sql .= "SELECT * FROM tb_users ";
    $sql .= "WHERE user_id= '" . $id . "'";
    $consulta=mysql_query($sql);
     
	while($lista = mysql_fetch_array($consulta)){
?>

<div id="form_bug">
		<form id="usuario_altera" name="usuario_altera" method="post" action="usuario_alterar_inclui_ok.php" onsubmit="return validaCad()">
        <table class="table_geral">
			<tr>
    			<td class="contato2">Nome:</td>
    			<td><input type="hidden" value="<?php echo $lista["user_id"]?>" id="id" name="id" /><input class="text_medio" type="text" value="<?php echo $lista["user_name"]?>" id="change_nome" name="change_nome" /></td>
    		</tr>
    		<tr>
        		<td class="contato2">Login:</td>
        		<td><input name="change_login" type="text" class="text_curto" id="change_login" value="<?php echo $lista["user_login"]?>" /></td>
        	</tr>
        	<tr>
        		<td class="contato2">Senha:</td>
        		<td><input name="change_senha" type="password" class="text_curto" id="change_senha" value="<?php echo $lista["user_pass"]?>" /></td>
        	</tr>
        	<tr>
        		<td class="contato2">Confirme sua senha:</td>
        		<td><input name="conf_change_senha" type="password" class="text_curto" id="conf_change_senha" value="" /></td>
    		</tr>
  			<tr>  				
  				<td><input name="protect" type="hidden" id="protect" value="true" /></td>
    			<td><input type="submit" class="submit" value="Alterar" /></td>
  			</tr>
		</table></form></div><!--form_bug-->

<?php
	}
?>


<?php include('incs/bottom.php'); ?>