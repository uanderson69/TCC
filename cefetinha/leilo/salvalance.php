<?php

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);

    include("adm/conexao.php");

    $idLance = isset($_POST['idlance']) ? $_POST['idlance'] : '';
    $ValorLance = isset($_POST['valorlance']) ? $_POST['valorlance'] : '';
    
    $sql = "INSERT INTO lance (idlance, valorlance) VALUES ('$idLance', '$ValorLance')";

    if(mysqli_query($con, $sql)){ //Aqui o mysqli_query está fazendo uma inserção no banco de dados
        echo "<script>alert('Lance dado com sucesso!');window.location='telainicial.php'</script>";	//Caso a inserção seja feita com sucesso, a página será redirecionada ao 1tela.html
        mysqli_close($con); 	//Fechando a conexão, é muito importante que ela seja fechada!!!!
    }
    else{
        print 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
        mysqli_close($con);
    }

?>