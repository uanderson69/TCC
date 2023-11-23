<?php
// Inicie a sessão
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['logado'])) {
    // Se não estiver logado, redirecione para a página de login
    header("Location: login.html");
    exit();
}

// Obtém informações do perfil a partir da sessão ou de um banco de dados, dependendo de como você as armazenou
$nomeUsuario = isset($_SESSION['Nome']) ? $_SESSION['Nome'] : 'Uanderson Teixeira';
$emailUsuario = isset($_SESSION['email']) ? $_SESSION['email'] : 'dersonluci03@gmail.com';
$senhaUsuario = isset($_SESSION['Senha']) ? $_SESSION['Senha'] : '123';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <style>
        /* Estilos CSS para a página de perfil */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        .navbar {
            margin-bottom: 0;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 20px;
        }

        h1 {
            margin-top: 0;
        }

        p {
            margin: 10px 0;
        }

        .edit-link {
            color: #00f7ff;
            text-decoration: none;
        }

        .edit-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Conteúdo do Perfil -->
    <div class="container mt-5">
        <h1>Perfil do Usuário</h1>
        <p><strong>Nome:</strong> <?php echo $nomeUsuario; ?></p>
        <p><strong>Email:</strong> <?php echo $emailUsuario; ?></p>
        <p><strong>Senha:</strong> <?php echo $senhaUsuario; ?></p>
        <!-- Adicione outras informações do perfil conforme necessário -->

        <!-- Adicione links para editar informações do perfil, se necessário -->
        

        <!-- Adicione qualquer outro conteúdo do perfil que você deseja exibir -->
    </div>

    <!-- Adicione o rodapé ou outros elementos conforme necessário -->

</body>

</html>
