<?php include('conn/conn.php'); ?>
<?php $vTitulo = "Gerenciamento de Promoções"; ?>
<?php include('incs/topo-adm.php'); ?>
	<h1><?php echo $vTitulo; ?></h1>

<?php
	$id = $_GET["id"];     

	$sql_imagem = "SELECT promo_imagem FROM tb_promo WHERE promo_id=$id";
	$consulta_imagem = mysql_query($sql_imagem);
	$lista_imagem = mysql_fetch_array($consulta_imagem);

	$foto_arquivo = $lista_imagem['promo_imagem'];
	
	if($foto_arquivo != ""){
	//apaga o arquivo thumb
	chdir('../images/promocoes/thumbs/'); 
	$delete = unlink($foto_arquivo);
	}
?>
<?php
    $sql="DELETE FROM tb_promo WHERE promo_id=$id";
    $consulta=mysql_query($sql);
?>

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
	
    <p class="destaque">Promoção excluída com sucesso.</p>
    
<?php include('incs/bottom.php'); ?>