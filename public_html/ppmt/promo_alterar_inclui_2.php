<?php include('conn/conn.php'); ?>
<?php $vTitulo = "Gerenciamento de Promoções"; ?>
<?php include('incs/topo-adm.php'); ?>
<?php include('incs/functions.php'); ?>
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

	$protect     = trim(str_replace("'","",$_POST['protect']));
	if($protect != "true") exit;
	
	$promo_nome        = trim(str_replace("'","",$_POST['promo_nome']));
	$promo_resumo        = trim(str_replace("'","",$_POST['promo_resumo']));
	$promo_descricao        = trim(str_replace("'","",$_POST['promo_descricao']));
	$promo_validade        = trim(str_replace("'","",$_POST['promo_validade']));
	$promo_id        = trim(str_replace("'","",$_POST['promo_id']));

	if(isset($_POST['delete_image'])){
		$delete_image        = trim(str_replace("'","",$_POST['delete_image']));
		if($delete_image != ''){
			$sqlDelete = "SELECT * FROM tb_promo WHERE promo_id = " . $promo_id;
			$sqlQueryDelete = mysql_query($sqlDelete);
			$listaDelete = mysql_fetch_array($sqlQueryDelete);
		
			$imagem = $listaDelete['promo_imagem'];
			
			if($imagem != ""){
				//apaga o arquivo pequeno
				chdir('../images/promocoes/thumbs/'); 
				$delete = unlink($imagem);
								
				$sqlUpdate="UPDATE tb_promo SET promo_imagem = '' WHERE promo_id = " . $promo_id;
				$sqlQueryUpdate = mysql_query($sqlUpdate);
			}
		}
		$arquivo1 = "";
	} else {
	$arquivo1 = upload($_FILES['promo_imagem'],'../images/promocoes/');
	
	if($arquivo1 != "") gerarThumbs($arquivo1,140,'../images/promocoes/thumbs/','../images/promocoes/');

	if($arquivo1 != ""){
		//apaga o arquivo grande
		chdir('../images/promocoes/'); 
		$delete = unlink($arquivo1);
		
			$sqlDelete = "SELECT * FROM tb_promo WHERE promo_id = " . $promo_id;
			$sqlQueryDelete = mysql_query($sqlDelete);
			$listaDelete = mysql_fetch_array($sqlQueryDelete);
		
			$imagem = $listaDelete['promo_imagem'];
			
			if($imagem != ""){
				//apaga o arquivo pequeno
				chdir('thumbs/'); 
				$delete = unlink($imagem);
				
				$sqlUpdate="UPDATE tb_promo SET promo_imagem = ''";
				$sqlQueryUpdate = mysql_query($sqlUpdate);
			}
	}
	}

?>

<?php
	if ($promo_nome == "" || $promo_resumo == "" || $promo_validade == "") {
		mysql_close($sistema_ppmt_conn);
		@session_start();
		@$_SESSION['msg_status'] = "Não foi possível inserir a promoção. Preencha todos os campos obrigatórios.";
		header("Location: promo_alterar_inclui.php?id=$promo_id");
	} else {
	$sqlUpdate  = "UPDATE tb_promo SET ";
	
	if ($arquivo1 != "") {
		$sqlUpdate .= "promo_imagem = '" . $arquivo1 . "',";
	}
	
	$sqlUpdate .= "promo_nome = '$promo_nome',promo_resumo='$promo_resumo',promo_descricao='$promo_descricao',promo_validade='$promo_validade' WHERE promo_id='" . $promo_id . "'";
	$query = mysql_query($sqlUpdate);

	echo "<p class='destaque'>Promoção alterada com sucesso!</p>";
	}
?>

<?php include('incs/bottom.php'); ?>