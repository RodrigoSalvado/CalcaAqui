<?php // Ligação à bd
include("../basedados/db.h");
global $conn;

if(isset($_GET['id_utilizador'])){
    $id_utilizador = $_GET['id_utilizador'];
    echo $id_utilizador;
}else{
    echo "erro id";
}

//user information
$sqlSelect = "SELECT * FROM conta WHERE id_utilizador = '$id_utilizador'";
$resultSelect = mysqli_query($conn, $sqlSelect);

if($resultSelect -> num_rows > 0){
    while($row = $resultSelect -> fetch_assoc()){
        $nome = $row['nome'];
        $genero = $row['genero'];
        $user = $row['username'];
        $email = $row['email'];
    }
}else{
    echo "<script>window.alert('Não foram encontrados resultados') ;</script>";
}

//pedidos information
$sqlPedidos = "SELECT servico, status_pedido FROM pedido_reparacao WHERE id_utilizador = '$id_utilizador'";
$resultPedidos = mysqli_query($conn, $sqlPedidos);

if($resultPedidos -> num_rows > 0){
    while($row2 = $resultPedidos -> fetch_assoc()){
        $servico = $row2['servico'];
        $status_pedido = $row2['status_pedido'];
    }
}else{
    echo "<script>window.alert('erro pedidos') ;</script>";
}

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

        <title>Cliente</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet" />
        <link href="css/responsive.css" rel="stylesheet" />
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

    <div class="container-c">
        <div class="parte1">

                <h3>Dados do cliente:</h3>
                <div class="foto">
                    <img src="images/user%20(1).png" alt="user-foto" style="width: 150px" height=150px">
                </div>
                <div class="dados-cliente">
                    <label class="campos3"><?php echo $nome ?></label><br>
                    <label class="campos3"><?php echo $genero ?></label><br>
                    <label class="campos3"><?php echo $user ?></label><br>
                    <label class="campos3"><?php echo $email?></label><br>
                </div>
        </div>
        <div class="parte2">
            <div class="informacoes-pedidos">
                <h3>Pedidos realizados:</h3>
                <div class="dados-pedidos">
                    <?php
                    //pedidos information
                    $sqlPedidos = "SELECT id_pedido, servico, status_pedido FROM pedido_reparacao WHERE id_utilizador = '$id_utilizador'";
                    $resultPedidos = mysqli_query($conn, $sqlPedidos);

                    if($resultPedidos -> num_rows > 0){
                        while($row2 = $resultPedidos -> fetch_assoc()){
                            $id_pedido = $row2['id_pedido'];
                            $servico = $row2['servico'];
                            $status_pedido = $row2['status_pedido'];

                            echo "<button class='pedido' onclick='window.location.href=\"pedidoDetalhado.php?id_pedido=$id_pedido\"' style='border: none;'>
                                    <label class='campos' id='id'>$id_pedido</label>
                                    <label class='campos' id='servico'>$servico</label>
                                    <label class='campos' id='estado'>$status_pedido</label>
                                  </button>";
                        }
                    }else{
                        if($resultPedidos -> num_rows == 0){
                            echo "ainda nao realizou nenhum pedido";
                        }else{
                            echo "erro ao realizar o select";
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
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

    <section class="container-fluid footer_section">

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