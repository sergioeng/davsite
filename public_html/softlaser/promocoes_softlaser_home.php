<h1>Home</h1>
<?php include('conn/conn.php'); ?>
<?php
	$sql="SELECT * FROM tb_promo ORDER BY promo_id DESC LIMIT 1";
    $consulta=mysql_query($sql);
    $lista = mysql_fetch_array($consulta);
    $linhas = mysql_num_rows($consulta);
	
	if($linhas == 0){
 		echo '<p>Nenhuma promoção cadastrada.</p>';
	} else {
		do{
?>
			<h2><?php echo $lista['promo_nome'];?></h2>
            <p><?php echo $lista['promo_descricao'];?></p>
            <p>Validade da Promoção: <?php echo $lista['promo_validade'];?></p>
            
<?php
		}while($lista = mysql_fetch_array($consulta));
	}
	mysql_close($sistema_ppmt_conn);
?>