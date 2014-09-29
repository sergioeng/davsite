<?php include('conn/conn.php'); ?>
<?php $vTitulo = "Cadastro de Usuários Administrativos"; ?>
<?php include('incs/topo-adm.php'); ?>

	<h1>Cadastro de Usuários Administrativos</h1>
	<div id="submenu">
    	<a href="usuario_inserir.php">Cadastrar Novo Usuário</a>
    	<a href="usuario_alterar.php">Alterar ou Excluir Usuário</a></div><!--submenu-->
    	
<?php

	$protect     = trim(str_replace("'","",$_POST['protect']));
	if($protect != "true") exit;
	
	$id        		= trim(str_replace("'","",$_POST['id']));
	$novo_nome      = trim(str_replace("'","",$_POST['change_nome']));
	$novo_login     = trim(str_replace("'","",$_POST['change_login']));
	$nova_senha     = trim(str_replace("'","",$_POST['change_senha']));

?>

<?php

	$sqlUser  = "";
	$sqlUser .= "SELECT * FROM tb_users ";
	$sqlUser .= "WHERE user_id != " . $id . " AND (user_login = '" . $novo_login . "' ";
	$sqlUser .= "OR user_pass = '" . $nova_senha . "') ";

	$queryUser = mysql_query($sqlUser);
	$regsUser  = mysql_num_rows($queryUser);

	if($regsUser > 0) {
	
		mysql_close($lbt_conn);
		@session_start();
		@$_SESSION['msg_status'] = "Outro usuário já possui este login ou senha.";
		header("Location: usuario_alterar_inclui.php?id=$id");
		
	} elseif ($novo_nome == "" || $novo_login == "" || $nova_senha == "") {
		mysql_close($lbt_conn);
		@session_start();
		@$_SESSION['msg_status'] = "Não foi possável alterar o usuário. Preencha o formulário corretamente.";
		header("Location: usuario_alterar_inclui.php?id=$id");
		
	} else {

	$sqlInsert  = "UPDATE tb_users SET ";
	$sqlInsert  .= "user_name = '". $novo_nome . "',";
	$sqlInsert  .= "user_login = '". $novo_login . "',";
	$sqlInsert  .= "user_pass = '" . $nova_senha . "'";
	$sqlInsert  .= "WHERE user_id = '" . $id . "'";

	$query = mysql_query($sqlInsert);

	echo "<p class='destaque'>Usuário alterado com sucesso!</p><!--mensagem-->";
	}
?>


<?php include('incs/bottom.php'); ?>