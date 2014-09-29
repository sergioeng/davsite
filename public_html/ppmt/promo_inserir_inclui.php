<?php include('conn/conn.php'); ?>
<?php $vTitulo = "Gerenciamento de Promoções"; ?>
<?php include('incs/topo-adm.php'); ?>
<?php include('incs/functions.php'); ?>
	<h1><?php echo $vTitulo; ?></h1>

<?php

	$protect     = trim(str_replace("'","",$_POST['protect']));
	if($protect != "true") exit;
	
	$promo_nome        = trim(str_replace("'","",$_POST['promo_nome']));
	$promo_resumo        = trim(str_replace("'","",$_POST['promo_resumo']));
	$promo_descricao        = trim(str_replace("'","",$_POST['promo_descricao']));
	$promo_validade        = trim(str_replace("'","",$_POST['promo_validade']));
	
	$arquivo1 = upload($_FILES['promo_imagem'],'../images/promocoes/');
	if($arquivo1 != "") gerarThumbs($arquivo1,140,'../images/promocoes/thumbs/','../images/promocoes/');

	if($arquivo1 != ""){
		//apaga o arquivo grande
		chdir('../images/promocoes/'); 
		$delete = unlink($arquivo1);
	}

?>

<?php
	if ($promo_nome == "" || $promo_resumo == "" || $promo_validade == "") {
		mysql_close($sistema_ppmt_conn);
		@session_start();
		@$_SESSION['msg_status'] = "Não foi possível inserir a promoção. Preencha todos os campos obrigatórios.";
		header("Location: promo_inserir.php");
	} else {
	$sqlInsert  = "INSERT INTO tb_promo(promo_nome,promo_resumo,promo_imagem,promo_descricao,promo_validade) VALUES('$promo_nome','$promo_resumo','$arquivo1','$promo_descricao','$promo_validade')";
	$query = mysql_query($sqlInsert);
	}
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
    
	<p class='destaque'>Promoção cadastrada com sucesso!</p>

<?php include('incs/bottom.php'); ?>