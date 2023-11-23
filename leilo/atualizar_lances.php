<?php
// Conectar ao banco de dados (substitua pelas suas credenciais)
require("adm/conexao.php");

// Consulta para obter os lances mais recentes
$sql = "SELECT d.idDesapego, d.NomeProduto, d.Valor, d.Link, MAX(l.ValorLance) AS LanceMaximo
        FROM desapego d
        LEFT JOIN lance l ON d.idDesapego = l.idDesapego
        GROUP BY d.idDesapego";
$result = mysqli_query($con, $sql);

// Verificar se a consulta foi bem-sucedida
if ($result) {
    $lances = array();

    // Processar os resultados da consulta
    while ($row = mysqli_fetch_assoc($result)) {
        $lances[] = array(
            'idDesapego' => $row['idDesapego'],
            'NomeProduto' => $row['NomeProduto'],
            'Valor' => $row['Valor'],
            'Link' => $row['Link'],
            'LanceMaximo' => ($row['LanceMaximo'] != null) ? $row['LanceMaximo'] : 0,
        );
    }

    // Retornar os resultados em formato JSON
    header('Content-Type: application/json');
    echo json_encode($lances);
} else {
    // Se houver um erro na consulta, retornar um JSON vazio com uma mensagem de erro
    echo json_encode(array('error' => 'Erro ao obter lances em tempo real.'));
}

// Fechar a conexão com o banco de dados
mysqli_close($con);
?>
