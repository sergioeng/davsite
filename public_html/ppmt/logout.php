<?php
@session_start();
@$_SESSION['permission'] = false;
@$_SESSION['msgLogin'] = "Sessão finalizada.";
header("Location: index.php");
?>