<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include("adm/conexao.php");

$emailUsuario = isset($_POST['email']) ? $_POST['email'] : '';
$idLance = isset($_POST['idLance']) ? $_POST['idLance'] : '';
$ValorLance = isset($_POST['valorlance']) ? $_POST['valorlance'] : '';
$tipoTroca = isset($_POST['tipoTroca']) ? $_POST['tipoTroca'] : '';

// Consulta para buscar o idDesapego do produto que está sendo oferecido em um lance
//$sqlProduto = "SELECT idDesapego FROM desapego WHERE idDesapego = '44'";
$sqlProduto = "SELECT * FROM desapego WHERE idDesapego = ".$_SESSION['idDesapego'];
$result = mysqli_query($con, $sqlProduto);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $idDesapego = $row['idDesapego']; // Obtem o id do produto que está sendo oferecido em um lance
} else {
    echo "Produto não encontrado";
}

// Insere o lance no banco de dados usando o idDesapego obtido da tabela desapego
$sql = "INSERT INTO lance (idDesapego, valorlance, Email, Troca) VALUES ('$idDesapego', '$ValorLance', '$emailUsuario', '$tipoTroca')";

if(mysqli_query($con, $sql)) {
    echo "<script>alert('Lance dado com sucesso!');window.location='index.php'</script>";
    mysqli_close($con);
} else {
    print 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
    mysqli_close($con);
}

?>
