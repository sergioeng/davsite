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
    
<?php
	$sql="SELECT * FROM tb_promo ORDER BY promo_id DESC";
    $consulta=mysql_query($sql);
    $lista = mysql_fetch_array($consulta);
    $linhas = mysql_num_rows($consulta);
	
	if($linhas == 0){
 		echo '<p class="destaque">Nenhuma promoção encontrada.</p>';
	} else {
		$color="#fff";

?>
		<table>
			<tr>
				<td>Nome da Promoção:</td>
    			<td>Validade:</td>
				<td></td>
  			</tr>
<?php
   
    	do {
			if($color=="#fff"){
				$color="#C7C8CF";
			}else{
				$color ="#fff";
			}
?>
			<tr bgcolor="<?php echo $color ?>">
				<td class="media"><?php echo $lista["promo_nome"]?></td>
    			<td class="media"><?php echo $lista["promo_validade"]?></td>
				<td><input class="submit_table" type="button" value="Excluir" onClick="javascript:if(confirm('Tem certeza que deseja excluir essa promoção?')){document.location.href=('promo_excluir_inclui.php?id=<?php echo $lista["promo_id"]?>');}" /></td>
  			</tr>
<?php	}
    	while($lista = mysql_fetch_array($consulta));
?>	    	

		</table>
<?php		
	}
?>

<?php include('incs/bottom.php'); ?>