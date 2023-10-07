<?php

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);

    include("adm/conexao.php");

    $idDesapego = isset($_POST['iddesapego']) ? $_POST['iddesapego'] : '';
    $NomeProduto = isset($_POST['nomeproduto']) ? $_POST['nomeproduto'] : '';
    $Valor = isset($_POST['valor']) ? $_POST['valor'] : '';
    $Link = isset($_POST['link']) ? $_POST['link'] : '';
    
    $sql = "INSERT INTO desapego (iddesapego, nomeproduto, valor, link) 
    VALUES ('$idDesapego', '$NomeProduto', '$Valor', '$Link')";

    if(mysqli_query($con, $sql)){ //Aqui o mysqli_query está fazendo uma inserção no banco de dados
        echo "<script>alert('Cadastrado com Sucesso!');window.location='telainicial.php'</script>";	//Caso a inserção seja feita com sucesso, a página será redirecionada ao 1tela.html
        mysqli_close($con); 	//Fechando a conexão, é muito importante que ela seja fechada!!!!
    }
    else{
        print 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
        mysqli_close($con);
    }

?>