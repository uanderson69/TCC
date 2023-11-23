<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include("adm/conexao.php");

$emailUsuario = isset($_POST['email']) ? $_POST['email'] : '';
$idServico = isset($_POST['idServico']) ? $_POST['idServico'] : '';
$tipoTroca = isset($_POST['tipoTroca']) ? $_POST['tipoTroca'] : '';

// Insira aqui o código necessário para obter o idServico com base nos dados recebidos

// Insere o serviço no banco de dados
$sql = "INSERT INTO lance (idServico, tipoTroca, Email) VALUES ('$idServico', '$tipoTroca', '$emailUsuario')";

if (mysqli_query($con, $sql)) {
    echo "<script>alert('Serviço registrado com sucesso!');window.location='index.php'</script>"; // Redireciona para index.php após o registro bem-sucedido
    mysqli_close($con); // Fecha a conexão com o banco de dados
} else {
    print 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
    mysqli_close($con); // Fecha a conexão com o banco de dados
}

?>
