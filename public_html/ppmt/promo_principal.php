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
    
    <div id="atencao">
    <h2>Atenção!</h2>
    	<p>Preencha todos os campos obrigatórios, indicados por um asterisco (*).</p>
    	  <p>Quanto ao UPLOAD DE IMAGENS:</p>
          <ul>
          <li>O sistema não permite a importação de arquivos com tamanho superior a 10MB. Podem ser importados arquivos nas extensões gif, jpg e png.</li>
          <li>Não se preocupe quanto à resolução das imagens a serem importadas, pois o sistema as redimensiona automaticamente.</li>
  	  </ul>
    </div><!--atencao--><br />

<?php include('incs/bottom.php'); ?>