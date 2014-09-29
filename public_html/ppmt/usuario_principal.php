<?php include('conn/conn.php'); ?>
<?php $vTitulo = "Cadastro de Usuários Administrativos"; ?>
<?php include('incs/topo-adm.php'); ?>
	<h1>Cadastro de Usuários Administrativos</h1>
		<div id="submenu">
		  <a href="usuario_inserir.php">Cadastrar Novo Usuário</a>
    	  <a href="usuario_alterar.php">Alterar ou Excluir Usuário</a></p></div>
		<!--submenu-->    
  
    <div id="atencao">
    <h2>Atenção!</h2>
    	  <ul>
          	<li>Preencha todos os campos obrigatórios, indicados por um asterisco (*).</li>
    	  	<li>Não é possível consultar a SENHA dos usuários por motivos de segurança. Caso algum usuário perca a senha, deve-se criar uma nova.</li>
          </ul>
    </div><!--atencao--><br />
<?php include('incs/bottom.php'); ?>