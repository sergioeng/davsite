<?php include("incs/topo.php"); ?>

<div id="editavel_index">
<?php
@session_start();
if(@$_SESSION['msgLogin'] != "") {
	echo "<p class='destaque'>" . @$_SESSION['msgLogin'] . "</p>";
	@$_SESSION['msgLogin'] = "";
} else {
	echo '&nbsp;';
}
?>
</div><!--editavel_index-->

<div class="centralizar_miolo_index">
<h1 class="h1_index">Sistema Administrativo</h1>
<form action="login.php" method="post" name="frmLogin" id="frmLogin" >
	<table>
		<tr>
			<td class="contato1">Login:</td>
			<td><input class="text_medio" name="user" type="text" id="user" maxlength="50" /></td>
		</tr>
		<tr>
			<td class="contato1">Senha:</td>
			<td><input class="text_medio" name="pass" type="password" id="pass" maxlength="50" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input class="submit" type="submit" name="btSubmit" id="btSubmit" value="Login" /></td>
		</tr>
	</table>
</form>
</div>
<?php include("incs/bottom.php"); ?>