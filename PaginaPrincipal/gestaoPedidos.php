<?php // Ligação à bd

session_start();
include("../basedados/db.h");
global $conn;

//mudar variavel de sessão
//descomentar para verificar se está logado ou não 

$nomeUser = $_SESSION["user"];


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

  <title>Gestão de pedidos</title>

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
          <a class="navbar-brand" href="index.php">
            <span>
              <img src="images/scissors.png" style="width: 80px">
</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Página Principal <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="servicos.php"> Serviços </a>
                </li>

              </ul>
              <div class="user_option">
                  <?php
                  if(isset($_SESSION["user"]) && $_SESSION["tipo"] == 1){
                      echo '
                                        <a href="admin.php">
                                            <img src="images/user.png" alt="">   
                                            <span style="text-decoration: none; color: white">' . htmlspecialchars($nomeUser) . '</span>                                    
                                        </a>
                                        <a href="logout.php">
                                            <img id="logout" src="images/logout.png" alt="" style="width: 25px; margin-left: 20px">
                                                                                        <span style="text-decoration: none; color: white">Logout</span>

                                        </a>
                                    ';
                  }else if(isset($_SESSION["user"]) && $_SESSION["tipo"] == 2){

                      echo '
                                        <a href="perfilCliente.php">
                                            
                                            <img src="images/user.png" alt="">   
                                            <span style="text-decoration: none; color: white">' . htmlspecialchars($nomeUser) . '</span>                                    
                                        </a>
                                        <a href="logout.php">
                                            <img id="logout" src="images/logout.png" alt="" style="width: 25px; margin-left: 20px">
                                                                                        <span style="text-decoration: none; color: white">Logout</span>

                                        </a>
                                        
                                    ';
                  }else{
                      echo '
                                        <a href="login.php">
                                            <img src="images/user.png" alt="">
                                        </a>
                                    ';
                  }
                  ?>

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
              <th class="text-center header" scope="col" role="columnheader"><span>Pedido</span></th>
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

                  // Número de resultados por página
                  $resultados_por_pagina = 5;

                  // Página atual
                  $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                  // Calcula o offset
                  $offset = ($pagina_atual - 1) * $resultados_por_pagina;

                  // Query para buscar os resultados paginados
                  $sql ="SELECT * FROM pedido_reparacao WHERE status_pedido != 'Recusado' ORDER BY 
                              CASE 
                                WHEN status_pedido = 'Em Espera' THEN 1 
                                WHEN status_pedido = 'Em Progresso' THEN 2 
                                WHEN status_pedido = 'Concluido' THEN 3 
                                ELSE 4 
                              END 
                            LIMIT $offset, $resultados_por_pagina";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          $id = $row["id_pedido"];
                          $servico = $row["servico"];
                          $calcado = $row["calcado"];
                          $status = $row["status_pedido"];
                          $idu = $row["id_utilizador"];
                          $senha = strtoupper($row["senha"]);

                          $sqlUser = "SELECT * FROM utilizador WHERE id_utilizador = $idu";
                          $resultUser = $conn->query($sqlUser);

                          if ($resultUser->num_rows > 0) {
                              $rowUser = $resultUser->fetch_assoc();
                              $user = $rowUser["username"];
                          }

                          echo "
            <tr>
                <td class='text-center'>$senha</td>
                <td class='text-center'>$user</td>
                <td class='text-center'>$servico</td>
                <td class='text-center'>$calcado</td>
                <td class='text-center'>$status</td>
                <td class='text-center'><a href='pedidoDetalhado_admin.php?id=$id'><button class='button_detalhes'>Detalhes</button></a></td>
            </tr>
        ";
                      }
                  }
                  ?>
            </div>
        </tbody>
    </table>
  </div>
<br>


  <!-- Adicione isso no seu HTML para mostrar os botões de paginação -->
  <div class="pagination">
      <?php
      // Botões de página anterior e próxima
      $pagina_anterior = $pagina_atual - 1;
      $proxima_pagina = $pagina_atual + 1;


      // Número total de resultados
      $sql_count = "SELECT COUNT(*) AS total FROM pedido_reparacao";
      $result_count = $conn->query($sql_count);
      $row_count = $result_count->fetch_assoc();
      $total_resultados = $row_count['total'];

      // Número de resultados por página
      $resultados_por_pagina = 5;

      // Número total de páginas
      $total_paginas = ceil($total_resultados / $resultados_por_pagina);


      ?>
        <div class="paginacao">
            <?php if ($pagina_atual > 1): ?>
                <a href="?pagina=<?php echo $pagina_anterior; ?>" class="btn"> < </a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <a href="?pagina=<?php echo $i; ?>" class="btn <?php echo ($i == $pagina_atual) ? 'active' : ''; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($pagina_atual < $total_paginas): ?>
                <a href="?pagina=<?php echo $proxima_pagina; ?>" class="btn"> > </a>
            <?php endif; ?>
        </div>

  </div>

<br><br>
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
              +351 000000000
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
                Dedicados em satisfazer as necessidades dos nossos clientes!</p>
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