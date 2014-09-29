<?php include('incs/topo.php');?>

	<h1>Pacotes e Promoções</h1>
    <p>A <span class="bold_dark">SoftLaser</span> não só trabalha para oferecer a você, cliente, a mais alta tecnologia para tratamentos seguros e eficazes, mas vai além e desenvolve periodicamente pacotes e promoções exclusivos, que vão de encontro ao que você deseja por preços ou condições bem especiais.</p><br /><br />

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
        <div class="promocao">
<?php
	$imagem = $lista['promo_imagem'];
	if($imagem == ""){
		$imagem = "default.jpg";
	}
?>
            <img class="img_promo" src="images/promocoes/thumbs/<?php echo $imagem;?>" alt="<?php echo $lista['promo_nome'];?>" title="<?php echo $lista['promo_nome'];?>" />
          <div class="texto_promo">
				<p><span class="texto_destaque"><?php echo $lista['promo_nome'];?></span></p>
            	<p><?php echo $lista['promo_resumo'];?></p>
            	<div class="bt_saiba_mais_promo"><a href="promocoes_pagina.php?id=<?php echo $lista["promo_id"];?>" alt="Saiba Mais" title="Saiba Mais">Saiba Mais</a></div><!--bt_saiba_mais-->
            </div>
          <!--texto_promo-->
        </div><!--promocao-->
<?php
		}while($lista = mysql_fetch_array($consulta));
	}
	mysql_close($soft_laser_conn);
?>    
    <img src="images/endereco.jpg" />
<?php include('incs/bottom.php');?>
