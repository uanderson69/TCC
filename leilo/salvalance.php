<?php

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);

    include("adm/conexao.php");

    $idLance = isset($_POST['idLance']) ? $_POST['idLance'] : '';
    $ValorLance = isset($_POST['valorlance']) ? $_POST['valorlance'] : '';

    // Consulta para buscar o id do produto que está sendo oferecido em um lance
    $sqlProduto = "SELECT idDesapego FROM desapego WHERE idDesapego = '$idLance'";
    $result = mysqli_query($con, $sqlProduto);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $idProduto = $row['idDesapego']; // Obtem o id do produto que está sendo oferecido em um lance
    } else {
        echo "0 results";
    }

    // Insere o lance no banco de dados usando o id do produto obtido na consulta anterior
    $sql = "INSERT INTO lance (idDesapego, valorlance) VALUES ('$idProduto', '$ValorLance')";

    if(mysqli_query($con, $sql)){ //Aqui o mysqli_query está fazendo uma inserção no banco de dados
        echo "<script>alert('Lance dado com sucesso!');window.location='index.php'</script>";	//Caso a inserção seja feita com sucesso, a página será redirecionada ao index.php
        mysqli_close($con);																		//Encerra a conexão com o banco de dados
    }else{
        print 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
        mysqli_close($con);																		//Encerra a conexão com o banco de dados
    }

?>