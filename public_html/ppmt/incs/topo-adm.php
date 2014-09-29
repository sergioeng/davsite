<?php
	@session_start();
	if($_SESSION['permission'] == false) {
		$_SESSION['msgLogin'] = "Sessão finalizada. Por favor, efetue o login novamente.";
		header("Location: index.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
<head>
<title>Cliente - Sistema Administrativo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="PieReti Propaganda e Marketing Tecnologia" />
<meta name="description" content="Sistema administrativo do website www.cliente.com.br" />
<meta name="keywords" content="" />
<link href="css/css_ppmt.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="../favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
</head>

<body>
	<div id="topo">
		<div class="centralizar">
			<div id="logo">
        		<a href="index.php"><img src="images/logo.jpg" width="270" height="83" title="SoftLaser" /></a>
            </div><!--logo-->
            <div id="descricao">
            	<p>Sistema Administrativo</p>
            </div><!--descricao-->
        </div><!--centralizar-->
  		<div class="linha"></div><!--linha-->
    </div><!--topo-->
    
	<div id="miolo">
    	<div class="centralizar_miolo">
        	<div id="conteudo">
            
  <div id="logado">
  <?php
	if($_SESSION['lastAccess'] == "") {
?>
	<div>Seja bem-vindo (a), <?php echo $_SESSION['userName']; ?>. Este é o seu primeiro acesso. | <a href="logout.php" alt="" class="link">LOGOUT</a></div>
    
<?php
	} else {
?>
   
    <div>Olá, <?php echo $_SESSION['userName']; ?>. Seu último acesso foi em <?php echo $_SESSION['lastAccess']; ?> (Horário de Brasília) | <a href="logout.php" alt="" class="link">LOGOUT</a></div>

<?php
	}
?>
			<hr /></div><!--logado-->
			
<?php if($_SESSION['levelAccess'] == "1") { ?>
				
	<div id="menu">
		<a href="../ppmt/principal.php">Principal</a>
		<a href="../ppmt/usuario_principal.php">Usuários Administrativos</a>
        <a href="promo_principal.php">Promoções</a>
	</div><!--menu-->
                
<?php
	}
?>
<div id="editavel">