<?php include('conn/conn.php'); ?>
<?php $vTitulo = "Cadastro de Usuários Administrativos"; ?>
<?php include('incs/topo-adm.php'); ?>
<h1>Cadastro de Usuários Administrativos</h1>
		<div id="submenu">
		  <a href="usuario_inserir.php">Cadastrar Novo Usuário</a>
    	  <a href="usuario_alterar.php">Alterar ou Excluir Usuário</a></div><!--submenu-->
        
		<p class="destaque"><?php echo @$_SESSION['msg_status']; ?></p><!--mensagem2-->
		<?php @$_SESSION['msg_status'] = ''; ?>
		
<?php
	$sql = "";
	$sql .= "SELECT * FROM tb_users ";
	$sql .= "ORDER BY user_name ASC";
	$consulta = mysql_query($sql);
	$linhas = mysql_num_rows($consulta);
	
	if($linhas == 0){
 		echo "Nenhum registro encontrado.";
	} else {
		$color="#fff";
?>

	<table>
    	<tr>
    		<td>Nome:</td>
    		<td>Login:</td>
    		<td></td>
    		<td></td>
    	</tr>

<?php
	while($lista = mysql_fetch_array($consulta)){
			if($color=="#fff"){
				$color="#C7C8CF";
			}else{
				$color ="#fff";
			}
?>
  
		<tr bgcolor="<?php echo $color ?>">
    		<td class="media"><?php echo $lista["user_name"]?></td>
    		<td class="media"><?php echo $lista["user_login"]?></td>
			<td><input class="submit_table" type="button" value="Alterar" onclick="javascript:document.location.href=('usuario_alterar_inclui.php?id=<?php echo $lista["user_id"];?>');" /></td>
			<td><input class="submit_table" type="button" value="Excluir" onclick="javascript:if(confirm('Tem certeza que deseja excluir esse usuário?')){document.location.href=('usuario_excluir.php?id=<?php echo $lista["user_id"]?>');}" /></td>
  		</tr>

<?php
	} //fechando o while acima
} //fechando o else
?>
	</table><br />

<?php include('incs/bottom.php'); ?>