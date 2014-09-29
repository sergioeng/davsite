<?php require_once('conn/conn.php'); ?>

<?php

	$protect     = trim(str_replace("'","",$_POST['protect']));
	if($protect != "true") exit;
	
	$nome        = trim(str_replace("'","",$_POST['nome_usu']));
	$login       = trim(str_replace("'","",$_POST['login_usu']));
	$senha       = trim(str_replace("'","",$_POST['senha_usu']));

?>

<?php

	$sqlUser  = "";
	$sqlUser .= "SELECT * FROM tb_users ";
	$sqlUser .= "WHERE user_login = '" . $login . "' ";
	$sqlUser .= "OR user_pass = '" . $senha . "' ";

	$queryUser = mysql_query($sqlUser);
	$regsUser  = mysql_num_rows($queryUser);

	if($regsUser != 0) {
	
		mysql_close($sistema_ppmt_conn);
		@session_start();
		@$_SESSION['msg_status'] = "Login ou senha existentes.";
		echo "<script>location.href='usuario_inserir.php';</script>";
		//header("Location: usuario_cadastra.php");
	
	} elseif ($nome == "" || $login == "" || $senha == "") {
		mysql_close($sistema_ppmt_conn);
		@session_start();
		@$_SESSION['msg_status'] = "Não foi possível efetuar o cadastro. Preencha o formulário corretamente.";
		echo "<script>location.href='usuario_inserir.php';</script>";
		//header("Location: usuario_cadastra.php");
		
} else {

	$sqlInsert  = "INSERT INTO tb_users ";
	$sqlInsert .= "(user_name,user_login,user_pass,user_levelaccess,user_lastaccess,user_active) ";
	$sqlInsert .= "VALUES (";
	$sqlInsert .= "'" . $nome . "',";
	$sqlInsert .= "'" . $login . "',";
	$sqlInsert .= "'" . $senha . "',";
	$sqlInsert .= "1,";
	$sqlInsert .= "'',";
	$sqlInsert .= "1)";

	$query = mysql_query($sqlInsert);

	mysql_close($sistema_ppmt_conn);
	echo "<script>location.href='usuario_ok.php';</script>";
	//header("Location: usuario_ok.php");

}
?>
