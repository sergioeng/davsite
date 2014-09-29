<?php include('conn/conn.php'); ?>
<?php $vTitulo = "Gerenciamento de Promoções"; ?>
<?php include('incs/topo-adm.php'); ?>
	<h1><?php echo $vTitulo; ?></h1>


<?php
	$sql = "SELECT * FROM tb_promo";
	$consulta = mysql_query($sql);
	$linhas = mysql_num_rows($consulta);
	$cadastrados = $linhas;
?>
    <h3>Há <?php echo $cadastrados; ?> promoção/promoções cadastrada(s) no banco de dados.</h3>
    <div id="submenu">
    <a class="submenu" href="../ppmt/promo_inserir.php">Inserir Promoções</a>
    <a class="submenu" href="../ppmt/promo_alterar.php">Alterar Promoções</a>
    <a class="submenu" href="../ppmt/promo_excluir.php">Excluir Promoções</a>
    </div><!--submenu-->
    
    <p class="destaque" id="mensagem"><?php echo @$_SESSION['msg_status']; ?></p>
	<?php @$_SESSION['msg_status'] = ''; ?>
    
    <script language="javascript" type="text/javascript">
	<!--

		function validaCad() {
			if(document.promo_alterar.promo_nome.value.length < 2) {
				document.getElementById('mensagem').innerHTML='Informe um nome para a promoção.';
				document.promo_alterar.promo_nome.focus();
				return false;
			}
			if(document.promo_alterar.promo_resumo.value.length < 2) {
				document.getElementById('mensagem').innerHTML='Insira uma descrição para a promoção.';
				document.promo_alterar.promo_resumo.focus();
				return false;
			}
			if(document.promo_alterar.promo_validade.value.length < 2) {
				document.getElementById('mensagem').innerHTML='Insira uma validade para a promoção.';
				document.promo_alterar.promo_validade.focus();
				return false;
			}
		}
	-->
	</script>

<?php
	$id = $_GET["id"];     
    $sql="SELECT * FROM tb_promo WHERE promo_id=$id";
    $consulta=mysql_query($sql);
?>    
    <table>    

<?php    
    while($lista = mysql_fetch_array($consulta)){
?>
	
    	<form id="promo_alterar" name="promo_alterar" method="post" action="promo_alterar_inclui_2.php" enctype="multipart/form-data" onsubmit="return validaCad()">
    	<table>
    		<tr>
    			<td class="contato2">Nome da promoção*:</td>
    			<td><input class="text_medio" type="text" maxlength="100" id="promo_nome" name="promo_nome" value="<?php echo $lista['promo_nome']; ?>" /></td>
    		</tr>
            <tr>
    			<td class="contato2">Resumo*:</td>
    			<td><textarea maxlength="500" id="promo_resumo" name="promo_resumo"><?php echo $lista['promo_resumo']; ?></textarea></td>
    		</tr>
<?php
		$imagem_atual = $lista['promo_imagem'];
		if($imagem_atual != ""){
?>    			
                <tr>
    				<td class="contato2">Imagem:</td>
                    <td><input class="text" type="file" id="promo_imagem" name="promo_imagem" /></td>
                </tr>
                <tr>
                	<td></td>
    				<td><img src="../images/promocoes/thumbs/<?php echo $imagem_atual; ?>" alt="<?php echo $lista['promo_imagem']; ?>" title="<?php echo $lista['promo_nome']; ?>" /></td>
    			</tr>
                <tr></tr>
                <tr>
                	<td class="contato2"><input type="checkbox" id="delete_image" name="delete_image" value="delete" /></td>
                    <td>Deixar sem imagem (deleta a imagem cadastrada para esta notícia)</td>
                </tr>
<?php
} else {
?>
				<tr>
    				<td class="contato2">Foto:</td>
    				<td><input class="text" type="file" id="promo_imagem" name="promo_imagem" /></td>
    			</tr>
                <tr>
                	<td></td>
                	<td>Nenhuma imagem cadastrada.</td>
                </tr>
<?php
}
?>    			
    		<tr>
    			<td class="contato2">Descrição:</td>
    			<td><textarea id="promo_descricao" name="promo_descricao" cols="8" rows="5"><?php echo $lista['promo_descricao']; ?></textarea></td>
      		</tr>
            <tr>
    			<td class="contato2">Validade*:</td>
    			<td><input class="text_curto" type="text" maxlength="100" id="promo_validade" name="promo_validade" value="<?php echo $lista['promo_validade']; ?>"/></td>
    		</tr>
      		<tr>
      			<td><input name="protect" type="hidden" id="protect" value="true" /><input name="promo_id" type="hidden" id="promo_id" value="<?php echo $lista["promo_id"]?>" /></td>
      				<td><input class="submit" type="submit" id="submit_promo_alterar" name="submit_promo_alterar" value="Alterar" /></td>
      			</tr>
      		</table>
    	</form>
<?php
}
?>
</table>
</div><!--ppmt-->
<?php include('incs/bottom.php'); ?>