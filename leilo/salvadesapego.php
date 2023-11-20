<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include("adm/conexao.php");

$NomeProduto = isset($_POST['nomeproduto']) ? $_POST['nomeproduto'] : '';
$Valor = isset($_POST['valor']) ? $_POST['valor'] : '';

// Verifica se o arquivo de imagem foi enviado com sucesso
if (isset($_FILES['imagem'])) {
  $uploadDir = 'C:/xampp/htdocs/cefetinha/leilo/uploads/'; // Substitua pelo caminho correto
  $uploadFile = $uploadDir.basename($_FILES['imagem']['name']);

  if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
    $Link = $uploadFile; // Salva o caminho da imagem no banco de dados
    $sql = "INSERT INTO desapego (NomeProduto, Valor, Link) VALUES ('$NomeProduto', '$Valor', '".basename($_FILES['imagem']['name'])."')";

    if (mysqli_query($con, $sql)) {
      echo "<script>alert('Cadastrado com Sucesso!');window.location='index.php'</script>";
      mysqli_close($con);
    } else {
      print 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
      mysqli_close($con);
    }
  } else {
    echo "Erro ao fazer o upload da imagem.";
  }
} else {
  echo "Arquivo de imagem não foi enviado.";
}
?>
