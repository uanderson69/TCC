<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="fonts/font.css">
</head>

<body>
  <!-- Criando a barra de navegação -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <table>
      <tr>
        <td><img src="imagens/logo.jpeg" alt="" width="70" height="70" class="d-inline-block align-text-top"></td>
        <td><a class="navbar-brand" href="#">LeiloDiv</a></td>
      </tr>
    </table>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="telainicial.html" title="Ir para a página inicial">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sobre_nos.html" title="Ir para a página de sobre nós">Sobre nós</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contato.html" title="Ir para a página de contatos">Contato</a>
        </li>

        <li class="nav-item" id="desapegarNavItem">
          <a class="nav-link" href="desapegar.html" title="Ir para a página de desapego">Desapegar</a>
        </li>
      </ul>
      <div class="navbar-nav ml-auto justify-content-end">
        <a class="nav-link" href="login.html">
          <button class="btn btn-outline-dark btn-rounded ml-3" title="Ir para login">Login</button>
        </a>
        <a class="nav-link" href="cadastrar.html">
          <button class="btn btn-outline-dark btn-rounded" title="Ir para cadastro">Cadastro</button>
        </a>
      </div>
    </div>
  </nav>

  <!-- Conteúdo principal -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-4">Leilões e serviços em destaque</h1>
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
          echo "<img src='".$dado['link']."'>";
          echo  "<a class='btn btn-outline-info btn-sm' target='_blank' href='".$dado['Link']."' >Foto do Produto</a>";
          echo "<p>Valor Incial: " . $dado['Valor'] . "</p>";
          echo "<p class='time-left'>Tempo restante: <span class='countdown' data-duration='60'></span></p>";
          echo "<button class='btn btn-bid' onclick='redirectToOptions()'>Dar lance</button>";
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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script>
    function startTimer(duration, timerElement) {
      var timer = duration, minutes, seconds;

      var intervalId = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        timerElement.textContent = minutes + ":" + seconds;

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
