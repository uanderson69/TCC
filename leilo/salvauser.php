<?php

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);

    include("adm/conexao.php");

    $idUsuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : '';
    $Nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $Email = isset($_POST['email']) ? $_POST['email'] : '';
    $Senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $ConfSenha = isset($_POST['confsenha']) ? $_POST['confsenha'] : '';
    $Nasc = isset($_POST['nasc']) ? $_POST['nasc'] : '';
    $Sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $CEP = isset($_POST['cep']) ? $_POST['cep'] : '';
    
    $sql = "INSERT INTO usuario (idusuario, nome, email, senha, confsenha, nasc, sexo, cep) 
    VALUES ('$idUsuario', '$Nome', '$Email', '$Senha', '$ConfSenha', '$Nasc', '$Sexo', '$CEP')";

    if(mysqli_query($con, $sql)){ //Aqui o mysqli_query está fazendo uma inserção no banco de dados
        echo "<script>alert('Cadastrado com Sucesso!');window.location='index.php'</script>";	//Caso a inserção seja feita com sucesso, a página será redirecionada ao index.php
        mysqli_close($con); 	//Fechando a conexão, é muito importante que ela seja fechada!!!!
    }
    else{
        print 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
        mysqli_close($con);
    }

?>