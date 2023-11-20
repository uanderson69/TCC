<?php

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);

    include("adm/conexao.php");

    $idContato = isset($_POST['idcontato']) ? $_POST['idcontato'] : '';
    $Descr = isset($_POST['descr']) ? $_POST['descr'] : '';
    
    $sql = "INSERT INTO contato (idcontato, descr) 
    VALUES ('$idContato', '$Descr')";

    if(mysqli_query($con, $sql)){ //Aqui o mysqli_query está fazendo uma inserção no banco de dados
        echo "<script>alert('Contato realizado com sucesso!');window.location='contato.html'</script>";	//Caso a inserção seja feita com sucesso, a página será redirecionada ao 1tela.html
        mysqli_close($con); 	//Fechando a conexão, é muito importante que ela seja fechada!!!!
    }
    else{
        print 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
        mysqli_close($con);
    }

?>