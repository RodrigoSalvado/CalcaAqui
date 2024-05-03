<?php // Ligação à bd

session_start();

include("../basedados/db.h");

//mudar variavel de sessão
//descomentar para verificar se está logado ou não 



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
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
    <link href="css/gestaoPedido.css" rel="stylesheet" />


</head>

<body class="sub_page">
  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="PaginaPrincipal.php">
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
                  <a class="nav-link" href="PaginaPrincipal.php">Página Principal <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> Sobre Nós </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="do.php"> Serviços </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="portfolio.php"> Portfolio </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contacte-nos</a>
                </li>
              </ul>
              <div class="user_option">
                <a href="">
                  <img src="images/user.png" alt="">
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

  <section class="admin_page">
    <div class="container">
      <div class="row">
        <div class="admin_box">
          <div class="admin_heading">
             <h2>Gestão de Pedidos</h2>
          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="container">
      <table class="table table-primary table-sortable" role="grid">
          <thead>
          <tr>
              <th class="header" scope="col" role="columnheader"><span>Pedido</span></th>
              <th class="text-center header" scope="col" role="columnheader"><span>Utilizador</span></th>
              <th class="text-center header" scope="col" role="columnheader"><span>Serviço</span></th>
              <th class="text-center header" scope="col" role="columnheader"><span>Calçado</span></th>
              <th class="text-center header" scope="col" role="columnheader"><span>Status</span></th>
              <th class="text-center header" scope="col" role="columnheader"><span>Detalhes</span></th>
          </tr>
          </thead>
          <tbody>
          <div class="botoes_gest">  

          <?php

          $sql = "SELECT * FROM pedido_reparacao";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                  $id = $row["id_pedido"];
                  $servico = $row["servico"];
                  $calcado = $row["calcado"];
                  $status = $row["status_pedido"];
                  $idu = $row["id_utilizador"];

                  $sqlUser = "SELECT * FROM utilizador where id_utilizador = $idu";
                  $resultUser = $conn->query($sqlUser);

                  if ($resultUser->num_rows > 0) {
                      $rowUser = $resultUser->fetch_assoc();
                      $user = $rowUser["username"];
                  }


                  echo "
            <tr>
              <td class='text-center'>$id</td>
              <td class='text-center'>$user</td>
              <td class='text-center'>$servico</td>
              <td class='text-center'>$calcado</td>
              <td class='text-center'>$status</td>
              <td class='text-center'><button></button></td>
          </tr>
          ";
              }
          }

          ?>


                      
          </div>
          </tbody>
      </table>
  </div>



















  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
            Sobre a Loja
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location-white.png" width="18px" alt="">
              </div>
              <p>
              Endereço
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/telephone-white.png" width="12px" alt="">
              </div>
              <p>
              +961 000000000
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/envelope-white.png" width="18px" alt="">
              </div>
              <p>
calcaaqui
                @gmail.com
                </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
Informações
            </h5>
            <p>
Colocar texto
</p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_insta">
            <h5>
Responsáveis
            </h5>
            <div class="insta_container">
              <div>
                <a href="">
                  <div class="insta-box b-1">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-2">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
              </div>

              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
              </div>
              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
Novidades
            </h5>
            <form action="">
              <input type="email" placeholder="Insira o e-mail">
              <button>
Subscrever
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>
              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
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