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
	
    <script language="javascript" type="text/javascript">
	<!--

		function validaCad() {
			if(document.promo_inserir.promo_nome.value.length < 2) {
				document.getElementById('mensagem').innerHTML='Informe um nome para a promoção.';
				document.promo_inserir.promo_nome.focus();
				return false;
			}
			if(document.promo_inserir.promo_resumo.value.length < 2) {
				document.getElementById('mensagem').innerHTML='Insira uma descrição para a promoção.';
				document.promo_inserir.promo_resumo.focus();
				return false;
			}
			if(document.promo_inserir.promo_validade.value.length < 2) {
				document.getElementById('mensagem').innerHTML='Insira uma validade para a promoção.';
				document.promo_inserir.promo_validade.focus();
				return false;
			}
		}
	-->
	</script>

    <p class="destaque" id="mensagem"><?php echo @$_SESSION['msg_status']; ?></p>
	<?php @$_SESSION['msg_status'] = ''; ?>

<br />
<div id="form_bug">	
    <form id="promo_inserir" name="promo_inserir" method="post" action="promo_inserir_inclui.php" enctype="multipart/form-data" onsubmit="return validaCad()">
    	<table>
    		<tr>
    			<td class="contato2">Nome da promoção*:</td>
    			<td><input class="text_medio" type="text" maxlength="100" id="promo_nome" name="promo_nome" /></td>
    		</tr>
            <tr>
    			<td class="contato2">Resumo*:</td>
    			<td><textarea maxlength="500" id="promo_resumo" name="promo_resumo"></textarea></td>
    		</tr>
    		<tr>
    			<td class="contato2">Foto:</td>
    			<td><input type="file" id="promo_imagem" name="promo_imagem"  class="text_curto" /></td>
    		</tr>
    		<tr>
    			<td class="contato2">Descrição:</td>
    			<td><textarea id="promo_descricao" name="promo_descricao" cols="8" rows="5"></textarea></td>
      		</tr>
            <tr>
    			<td class="contato2">Validade*:</td>
    			<td><input class="text_curto" type="text" maxlength="100" id="promo_validade" name="promo_validade" /></td>
    		</tr>
      		<tr>
      			<td><input name="protect" type="hidden" id="protect" value="true" /></td>
      			<td><input class="submit" type="submit" id="submit_promo_inserir" name="submit_promo_inserir" value="Cadastrar" /></td>
      		</tr>
      	</table>
    </form>
</div>
<?php include('incs/bottom.php'); ?>