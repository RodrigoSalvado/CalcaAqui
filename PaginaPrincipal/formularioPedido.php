<?php
include("../basedados/db.h");

$tipo_servico = $_GET["id"];





?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Calça Aqui</title>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <link href="css/forPedido.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="./PaginaPrincipal.php">
            <span>
              Calça Aqui
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="./PaginaPrincipal.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./about.php"> About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./do.php"> What we do </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./portfolio.php"> Portfolio </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./contact.php">Contact us</a>
                </li>
              </ul>
              <div class="user_option">
                <a href="">
                  <img src="./images/user.png" alt="">
                </a>
                <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                </form>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>

  <br>
  <br>

<div class="nomeUtilizador">
  <section>
    <div class="nomeUtilizador">
    <h3>Nome do Utilizador:</h3>
    <input type="text" name="" required><br>
    <h3>Tipo de serviço:</h3>
    <select required>
        <?php
        $sql = "SELECT * FROM servico";
        $result = $conn->query($sql);
        echo "<option>$tipo_servico</option>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($row["tipo_servico"] != $tipo_servico){
                    echo "<option>" . $row["tipo_servico"] . "</option>";
                }
            }
        }
        ?>

    </select>
  
    <h3>Email:</h3>
    <input type="text" name="" required>
  
    <h3>Foto:</h3>
    <input type="file" name="imagem" required/>
  
    <h3>Calendário</h3>
    <label>Precisa do Serviço feito até alguma data?<br>
           Se sim selecione a data!</label>
           <br>
    <input type="date">
          </div>
</div>
<div class="botao">
    <input type="submit" value="Enviar">
</div>

  </section>
  
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>

  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 0,
      navText: [],
      center: true,
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        1000: {
          items: 3
        }
      }
    });

  </script>
  </body>
</html>


<?php


$conn -> close();
?>