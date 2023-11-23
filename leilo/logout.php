<?php
// Inicia a sessão
session_start();

// Destrói a sessão
session_destroy();

// Redireciona para a página de login ou qualquer outra página desejada após o logout
header("Location: index.php");
exit();
?>
