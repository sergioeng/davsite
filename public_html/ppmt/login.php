<?php include('conn/conn.php'); ?>

<?php

	$vUser = trim(str_replace("'","",$_POST['user']));
	$vPass = trim(str_replace("'","",$_POST['pass']));

	$sqlUser  = "";
	$sqlUser .= "SELECT * FROM tb_users ";
	$sqlUser .= "WHERE user_login = '" . $vUser . "' ";
	$sqlUser .= "AND user_pass = '" . $vPass . "' ";
	$sqlUser .= "AND user_active = 1";

	$queryUser = mysql_query($sqlUser);
	$regsUser  = mysql_num_rows($queryUser);
	
	//echo $vUser;
	//echo $vPass;

	if($regsUser == 0) {
		mysql_close($soft_laser_conn);
		@session_start();
		@$_SESSION['msgLogin'] = "Login inv&aacute;lido.";
		echo "<script>location.href='index.php';</script>";
		//header("Location: index.php");
	} else {
		$vData = date('d') . "/" . date('m') . "/" . date('Y') . " - " . date('H:i',time()-7200);
		//echo $vData;
		@session_start();
		@$_SESSION['msgLogin'] = "";
		@$_SESSION['lastAccess'] = mysql_result($queryUser,0,"user_lastaccess");
		@$_SESSION['userName'] = mysql_result($queryUser,0,"user_name");
		@$_SESSION['levelAccess'] = mysql_result($queryUser,0,"user_levelaccess");
		@$_SESSION['permission'] = true;
			// Inserting Events Log
		$sqlLog   = "";
		$sqlLog  .= "INSERT INTO tb_log_users ";
		$sqlLog  .= "VALUES('','" . mysql_result($queryUser,0,"user_id") . "',";
		$sqlLog  .= "'" . $vData . "')";
		$queryLog = mysql_query($sqlLog);
			// Updating Last Access
		$sqlUpdUser   = "";
		$sqlUpdUser  .= "UPDATE tb_users ";
		$sqlUpdUser  .= "SET user_lastaccess = '" . $vData . "' ";
		$sqlUpdUser  .= "WHERE user_id = " . mysql_result($queryUser,0,"user_id");
		$queryUpdUser = mysql_query($sqlUpdUser);
		mysql_close($soft_laser_conn);
		echo "<script>location.href='principal.php';</script>";
		//header("Location: principal.php");
	}
	
?>