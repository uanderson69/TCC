<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include("adm/conexao.php");

// Supondo que o e-mail do usuário logado seja armazenado na variável de sessão $_SESSION['logado']
$emailUsuario = isset($_SESSION['logado']) ? $_SESSION['logado'] : '';

$idLance = isset($_POST['idLance']) ? $_POST['idLance'] : '';
$ValorLance = isset($_POST['valorlance']) ? $_POST['valorlance'] : '';

// Consulta para buscar o idDesapego do produto que está sendo oferecido em um lance
$sqlProduto = "SELECT idDesapego FROM lance WHERE idLance = '$idLance'";
$result = mysqli_query($con, $sqlProduto);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $idProduto = $row['idDesapego']; // Obtem o id do produto que está sendo oferecido em um lance
} else {
    echo "Produto não encontrado";
}

// Insere o lance no banco de dados usando o idDesapego obtido da tabela desapego
$sqlDesapego = "SELECT idDesapego FROM desapego WHERE idDesapego = '$idLance'";
$resultDesapego = mysqli_query($con, $sqlDesapego);

if (mysqli_num_rows($resultDesapego) > 0) {
    $rowDesapego = mysqli_fetch_assoc($resultDesapego);
    $idDesapego = $rowDesapego['idDesapego']; // Obtem o idDesapego do produto diretamente da tabela desapego
} else {
    echo "Produto não encontrado na tabela desapego";
}

// Insere o lance no banco de dados usando o idDesapego obtido na consulta anterior
$sql = "INSERT INTO lance (idDesapego, valorlance, email) VALUES ('$idDesapego', '$ValorLance', '$emailUsuario')";

if(mysqli_query($con, $sql)) {
    echo "<script>alert('Lance dado com sucesso!');window.location='index.php'</script>"; // Caso a inserção seja feita com sucesso, a página será redirecionada ao index.php
    mysqli_close($con); // Encerra a conexão com o banco de dados
} else {
    print 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
    mysqli_close($con); // Encerra a conexão com o banco de dados
}

?>
