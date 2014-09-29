<?php include('conn/conn.php'); ?>
<?php $vTitulo = "Cadastro de Usuários Administrativos"; ?>
<?php include('incs/topo-adm.php'); ?>

<h1>Cadastro de Usuários Administrativos</h1>
	<div id="submenu">
    	<a href="usuario_inserir.php">Cadastrar Novo Usuário</a>
    	<a href="usuario_alterar.php">Alterar ou Excluir Usuário</a></div><!--submenu-->

<?php

	$id = $_GET["id"]; 

	$sqlInsert  = "DELETE FROM tb_users ";
	$sqlInsert  .= "WHERE user_id='". $id . "'";
	$query = mysql_query($sqlInsert);

	echo "<p class='destaque'>Usuário excluído com sucesso!</p><!--mensagem-->";

?>


<?php include('incs/bottom.php'); ?>