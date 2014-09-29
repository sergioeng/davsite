<h1>Promoções</h1>
<?php include('conn/conn.php'); ?>
<?php
	$sql="SELECT * FROM tb_promo ORDER BY promo_id DESC";
    $consulta=mysql_query($sql);
    $lista = mysql_fetch_array($consulta);
    $linhas = mysql_num_rows($consulta);
	
	if($linhas == 0){
 		echo '<p>Nenhuma promoção encontrada.</p>';
	} else {
		do{
?>
			<h2><?php echo $lista['promo_nome'];?></h2>
            <img src="images/promocoes/thumbs/<?php echo $lista['promo_imagem'];?>" alt="<?php echo $lista['promo_nome'];?>" title="<?php echo $lista['promo_nome'];?>" />
            <p>Validade: <?php echo $lista['promo_validade'];?></p>
            <p>Detalhes: <?php echo $lista['promo_descricao'];?></p>
<?php
		}while($lista = mysql_fetch_array($consulta));
	}
	mysql_close($sistema_ppmt_conn);
?>