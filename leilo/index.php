<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css"
        integrity="sha384-u4AZ8CKLNXtD1EXyW2ouNlwYz7i4tcbH+46U5Jqg8XAVXy4/KG6t2OqXjPFFuk3R"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/font.css">
</head>

<body>

    <!-- Criando a barra de navegação -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <table>
            <tr>
                <td><img src="imagens/logo.jpeg" alt="" width="70" height="70"
                        class="d-inline-block align-text-top"></td>
                <td><a class="navbar-brand" href="#">LeiloDiv</a></td>
            </tr>
        </table>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" title="Ir para a página inicial">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre_nos.html" title="Ir para a página de sobre nós">Sobre nós</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contato.html" title="Ir para a página de contatos">Contato</a>
                </li>

                <?php
                session_start();
                // Verifica se o usuário está logado
                if (isset($_SESSION['logado'])) {
                    ?>
                <!-- Seção Perfil -->
                <li class="nav-item" id="desapegarNavItem">
                    <a class="nav-link" href="desapegar.html" title="Ir para a página de desapego">Desapegar</a>
                </li>
                <?php
            }
            ?>

            </ul>
            <div class="navbar-nav ml-auto justify-content-end">
                <?php
                // Verifica se o usuário está logado
                if (!isset($_SESSION['logado'])) {
                    ?>
                <!-- Botões de Login e Cadastro -->
                <a class="nav-link" href="login.html">
                    <button class="btn btn-outline-dark btn-rounded ml-3" title="Ir para login">Login</button>
                </a>
                <a class="nav-link" href="cadastrar.html">
                    <button class="btn btn-outline-dark btn-rounded" title="Ir para cadastro">Cadastro</button>
                </a>
                <?php
            } else {
                // Caso o usuário esteja logado, pode adicionar outros elementos aqui, como um botão de logout, por exemplo.
                ?>
                <!-- Botão de Logout -->
                <li class="nav-item" id="perfilNavItem">
                    <a class="nav-link" href="perfil.php" title="Ir para a página de perfil">
                        <button class="btn btn-outline-dark btn-rounded ml-3" title="Perfil">
                            Perfil
                        </button>
                    </a>
                </li>
                <a class="nav-link" href="logout.php">
                    <button class="btn btn-outline-dark btn-rounded ml-3" title="Logout">Logout</button>
                </a>
                <?php
            }
            ?>
            </div>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Leilões em destaque</h1>
            <p class="lead">Aqui estão alguns dos nossos leilões mais emocionantes e imperdíveis.</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php
            require("adm/conexao.php");
            $sql = "SELECT * FROM desapego ORDER BY idDesapego DESC";
            $res = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($res);
            if ($num_rows > 0) {
                while ($dado = mysqli_fetch_assoc($res)) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='auction-item'>";
                    echo "<h3>" . $dado['NomeProduto'] . "</h3>";
                    echo "<img src='uploads/" . $dado['Link'] . "' alt='" . $dado['Link'] . "'>"; // Exibe a imagem
                    echo "<p>Valor Inicial: " . $dado['Valor'] . "</p>";

                    // Verifica se o usuário está logado
                    if (isset($_SESSION['logado'])) {
                        //mysqli_query($con, "select max(ValorLance) from lance where idDesapego = ".$dado['idDesapego']) ;
                        $VLance = mysqli_query($con, "SELECT MAX(ValorLance) as LanceMaximo FROM lance WHERE idDesapego = " . $dado['idDesapego']);
                        if (!$VLance) {
                            echo "Erro na consulta SQL: " . mysqli_error($con);
                        } else {
                            $row = $VLance->fetch_assoc();
                            if ($row['LanceMaximo'] !== null) {
                                echo "<p>Valor Atual: " . $row['LanceMaximo'] . "</p>";
                            } else {
                                echo "<p>Este produto ainda não recebeu lances.</p>";
                            }
                        }

                        $duration = 604800; // 1 semana em segundos
                        echo "<p class='time-left'>Tempo restante: <span class='countdown' data-duration='" . $duration . "'></span></p>";
                        echo "<button class='btn btn-bid' onclick='redirectToOptions()'>Dar lance</button>";
                    } else {
                        echo "<p class='text-danger'>Faça o login para dar lances.</p>";
                    }

                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

    <footer class="footer" style="background-color: #ffffff00;">
        <div class="container text-center">
            <p style="color: #050000;">Todos os direitos reservados &copy; 2023 LeiloDiv</p>
        </div>
    </footer>

    <!-- JavaScript para o cronômetro -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

    <script>
        function startTimer(duration, timerElement) {
    var timer = duration;

    var intervalId = setInterval(function () {
        var weeks = parseInt(timer / (7 * 24 * 3600), 10);
        var days = parseInt((timer % (7 * 24 * 3600)) / (24 * 3600), 10);
        var hours = parseInt((timer % (24 * 3600)) / 3600, 10);
        var minutes = parseInt((timer % 3600) / 60, 10);
        var seconds = parseInt(timer % 60, 10);

        var timerText = "";

        if (weeks > 0) {
            timerText += weeks + " semana" + (weeks > 1 ? "s" : "") + ", ";
        }

        if (days > 0) {
            timerText += days + " dia" + (days > 1 ? "s" : "") + ", ";
        }

        timerText += hours < 10 ? "0" + hours : hours;
        timerText += " horas, ";
        timerText += minutes < 10 ? "0" + minutes : minutes;
        timerText += " minutos, ";
        timerText += seconds < 10 ? "0" + seconds : seconds;
        timerText += " segundos";

        timerElement.textContent = timerText;

        if (--timer < 0) {
            clearInterval(intervalId);
            timerElement.textContent = "Tempo esgotado";
        }
    }, 1000);
}

        var countdowns = document.querySelectorAll('.countdown');

        countdowns.forEach(function (countdown) {
            var duration = parseInt(countdown.getAttribute('data-duration'), 10);
            startTimer(duration, countdown);
        });

        function redirectToOptions() {
            window.location.href = "opcoes.html";
        }
    </script>
</body>

</html>
