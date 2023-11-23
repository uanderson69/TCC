<?php
session_start();

require("adm/conexao.php");

if (isset($_POST["email"]) && isset($_POST["senha"])) {
    $Email = $_POST["email"];
    $Senha = $_POST["senha"];

    $sql = "SELECT * FROM usuario WHERE email='" . $Email . "' AND senha='" . $Senha . "'";

    $selecionado = mysqli_query($con, $sql);

    if ($dados = mysqli_fetch_assoc($selecionado)) {
        $perfilBanco = $dados["Perfil"];
        if ($perfilBanco == 1) {
            $_SESSION['id'] = $dados['idUsuario'];
            $_SESSION['Nome'] = $dados['Nome'];
            $_SESSION['email'] = $dados['email'];
            $_SESSION['senha'] = $dados['senha'];
            $_SESSION['perfil'] = $dados['Perfil'];
            $_SESSION['logado'] = true;
            header("Location: index.php");
        } else {
            header("Location: lancesdados.php"); // Corrigido o redirecionamento para login.html
        }
    } else {
        echo "<script>alert('Usuário Inválido, tente novamente!');window.location='login.html'</script>";
    }
} else {
    // Lidar com o caso em que email ou senha não estão definidos
    echo "<script>alert('Email ou senha não estão definidos!');window.location='login.html'</script>";
}
?>
