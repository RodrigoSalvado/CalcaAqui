<?php // Ligação à bd
global $conn;
include("../basedados/db.h");

$id_servico = $_GET["id"];

$sql = "SELECT * FROM servico WHERE id_servico = $id_servico";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

?>


<!DOCTYPE HTML>
<html lang="">
<head>
    <title>Calça Aqui</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="ServicoDetalhado/assets/css/main.css" />

    <noscript><link rel="stylesheet" href="ServicoDetalhado/assets/css/noscript.css" /></noscript>

    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->

    <!-- Nav -->
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
                                    <a class="nav-link" href="servicos.php"> Serviços </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="portfolio.php"> Portfolio </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contacte-nos</a>
                                </li>
                            </ul>
                            <div class="user_option">
                            <?php
                                session_start();

                                $href = 'login.php';
                                                
                                if (isset($_SESSION['user'])) {
                                if ($_SESSION['user']['tipo_user'] == 1) {
                                    $href = 'admin.php';
                                } elseif ($_SESSION['user']['tipo_user'] == 2) {
                                    $href = 'perfilCliente.php';
                                }
                            }
                            ?>
                            <a href="<?php echo $href; ?>">
                                <img src="images/user.png" alt="User">
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





    <!-- Main -->
    <div id="main">
        <!-- Introduction -->
        <section id="intro" class="main">
            <div class="spotlight">
                <div class="content">
                    <header class="major">
                        <?php
                        echo $row["tipo_servico"];
                        ?>
                    </header>
                    <?php
                    echo $row["descricao"];
                    ?>
                    <ul class="actions">
                        <?php
                        $tipoServico = $row["tipo_servico"];
                        echo "<li><a href='formularioPedido.php?id=".$tipoServico."' class='button'>Fazer Pedido</a></li>"
                        ?>

                    </ul>
                </div>
                <span class="image">
                    <?php
                    $caminho = $row["foto"];
                    echo "<img src='ServicoDetalhado/images/$caminho' height='265px' > ";
                    ?>

                </span>
            </div>
        </section>
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
</div>

<!-- Scripts -->
<script src="ServicoDetalhado/assets/js/jquery.min.js"></script>
<script src="ServicoDetalhado/assets/js/jquery.scrollex.min.js"></script>
<script src="ServicoDetalhado/assets/js/jquery.scrolly.min.js"></script>
<script src="ServicoDetalhado/assets/js/browser.min.js"></script>
<script src="ServicoDetalhado/assets/js/breakpoints.min.js"></script>
<script src="ServicoDetalhado/assets/js/util.js"></script>
<script src="ServicoDetalhado/assets/js/main.js"></script>

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

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



    $conn -> close(); // Não apagar, escrever codigo php antes disto
?>
