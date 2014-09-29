<?php include('incs/topo.php');?>

	<h1>Promoções</h1>
<?php include('conn/conn.php'); ?>
<?php
	$promo_id = $_GET["id"];
	$sql="SELECT * FROM tb_promo WHERE promo_id = '" . $promo_id . "'";
    $consulta=mysql_query($sql);
    $lista = mysql_fetch_array($consulta);
    $linhas = mysql_num_rows($consulta);
	
	if($linhas == 0){
 		echo '<p>Nenhuma promoção encontrada.</p>';
	} else {
		do{
?>
			<p><span class="texto_destaque"><?php echo $lista['promo_nome'];?></span></p>
            <p><span class="bold">Validade:</span> <?php echo $lista['promo_validade'];?></p><br />
<?php
	$imagem = $lista['promo_imagem'];
	if($imagem != ""){
?>
            <img src="images/promocoes/thumbs/<?php echo $lista['promo_imagem'];?>" alt="<?php echo $lista['promo_nome'];?>" title="<?php echo $lista['promo_nome'];?>" /><br /><br />
<?php
	}
?>
            <p><?php echo $lista['promo_descricao'];?></p><br />
            <div class="bt_saiba_mais_promo"><a href="promocoes.php" alt="Saiba Mais" title="Saiba Mais">Voltar</a></div><!--bt_saiba_mais--><br /><br />

<?php
		}while($lista = mysql_fetch_array($consulta));
	}
	mysql_close($soft_laser_conn);
?>    
    <br /><br />
    <img src="images/endereco.jpg" />
<?php include('incs/bottom.php');?>
