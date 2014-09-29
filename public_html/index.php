<?php include('incs/topo.php');?>
                <div id="bt_home_a_softlaser">
                          <a href="a_softlaser.php"><img src="images/bt_a_softlaser.jpg" alt="A SoftLaser" title="A SoftLaser"/></a>
                          <p>Descubra por que nossos serviços são a melhor opção para depilação a laser no mercado.</p>
                            <div class="bt_saiba_mais"><a href="a_softlaser.php" alt="Saiba Mais" title="Saiba Mais">Saiba Mais</a></div><!--bt_saiba_mais--><br /><br /><br />
                    <div id="box_info_home">
                              <span class="bold">NiteróiShopping - 3º Piso - Loja 301</span><br /> 
                        Rua da Conceição, 188 - Centro - Niterói</span>
                           </div><!--box_info_home-->
                        </div><!--bt_home_a_soft_laser-->
                        <div id="bt_home_pacotes_e_promo">
<?php include('conn/conn.php'); ?>
<?php
  $sql="SELECT * FROM tb_promo ORDER BY promo_id DESC LIMIT 1";
    $consulta=mysql_query($sql);
    $lista = mysql_fetch_array($consulta);
    $linhas = mysql_num_rows($consulta);
  
  if($linhas == 0){
?>
     <p>Nenhuma promoção cadastrada.</p>

<?php
  } else {
    do{
      $promo_nome = strip_tags($lista["promo_nome"]);
      $promo_nome = explode(' ', $promo_nome); 
      $promo_nome = array_slice($promo_nome, 0, 3);
      $promo_nome = implode(' ', $promo_nome);

      $promo_descricao = strip_tags($lista["promo_descricao"]);
      $promo_descricao = explode(' ', $promo_descricao); 
      $promo_descricao = array_slice($promo_descricao, 0, 10);
      $promo_descricao = implode(' ', $promo_descricao);

      $promo_validade = strip_tags($lista["promo_validade"]);
      $promo_validade = explode(' ', $promo_validade); 
      $promo_validade = array_slice($promo_validade, 0, 3);
      $promo_validade = implode(' ', $promo_validade);
?>
                          <div class="texto_destaque"><?php echo $promo_nome;?></div><!--texto_destaque-->
                            <p><?php echo $promo_descricao;?></p>
                            <p><span class="bold">Validade da Promoção:</span> <?php echo $promo_validade;?></p>
                            <div class="bt_saiba_mais"><a href="promocoes_pagina.php?id=<?php echo $lista["promo_id"];?>" alt="Saiba Mais" title="Saiba Mais">Saiba Mais</a></div>
                          <!--bt_saiba_mais-->    
<?php
    }while($lista = mysql_fetch_array($consulta));
  }
  mysql_close($soft_laser_conn);
?>
                        </div><!--bt_home_pacotes_e_promo-->

                        <div id="bt_home_soprano">
                           <p>Veja o que esta potente tecnologia pode fazer pela sua pele.</p>
                            <div class="bt_saiba_mais"><a href="depilacao_a_laser.php" alt="Saiba Mais" title="Saiba Mais">Saiba Mais</a></div><!--bt_saiba_mais-->
                        </div><!--bt_home_soprano-->
<?php include('incs/bottom.php');?>