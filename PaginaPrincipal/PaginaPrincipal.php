<?php // Ligação à bd
include("../basedados/db.h");
global $conn;
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
</head>

<body>
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
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <br><br>
    <section class=" slider_section position-relative">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col">
                                <div class="detail-box">
                                    <div>
                                        <h2>
                                            Sapataria
                                        </h2>
                                        <h1>
                                            Calça aqui
                                        </h1>
                                        <p>
                                            Somos uma loja dedidcada em satisfazer as necessidades dos nossos clientes,
                                            desde serviços complexos, como costura do calçado, a serviços mais simples, como a
                                            limpeza dos sapatos.
                                        </p>
                                        <div class="">
                                            <a href="do.php">
                                                Saiba Mais
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col">
                                <div class="detail-box">
                                    <div>
                                        <h2>
                                            Sapataria
                                        </h2>
                                        <h1>
                                            Calça aqui
                                        </h1>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                            labore
                                        </p>
                                        <div class="">
                                            <a href="">
                                                Contact us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col">
                                <div class="detail-box">
                                    <div>
                                        <h2>
                                            Sapataria
                                        </h2>
                                        <h1>
                                            Calça aqui
                                        </h1>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                            labore
                                        </p>
                                        <div class="">
                                            <a href="">
                                                Contact us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="do_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                O que Fazemos
            </h2>
            <p>
                Aqui apresentamos todos os serviços da nossa sapataria!
            </p>
        </div>
        <div class="do_container">
            <div class="box arrow-start arrow_bg">
                <div class="img-box">
                    <a href='servicoDetalhado.php?id="1"' style="width: 100%">
                        <img src="images/agulha.png" alt="">
                    </a>
                </div>
                <div class="detail-box">
                    <label<h6>
                            Costura do <br>
                            Calçado
                        </h6></label>
                </div>
            </div>
            <div class="box arrow-middle arrow_bg">
                <div class="img-box">
                    <a href='servicoDetalhado.php?id="2"' style="width: 100%">
                        <img src="images/sapato.png" alt="">
                    </a>

                </div>
                <div class="detail-box">
                    <label>
                        <h6>
                            Muda de Capa <br>
                            e Sola
                        </h6>
                    </label>
                </div>
            </div>
            <div class="box arrow-middle arrow_bg">
                <div class="img-box">
                    <a href='servicoDetalhado.php?id="3"' style="width: 100%">
                        <img src="images/engraxamento.png" alt="">
                    </a>

                </div>
                <div class="detail-box">
                    <label>
                        <h6>
                            Engraxamento
                        </h6>
                    </label>
                </div>
            </div>
            <div class="box arrow-end arrow_bg">
                <div class="img-box">
                    <a href='servicoDetalhado.php?id="4"' style="width: 100%" >
                        <img src="images/sponge.png" alt="">
                    </a>

                </div>
                <div class="detail-box">
                    <label>
                        <h6>
                            Limpeza do <br>
                            Calçado
                        </h6>
                    </label>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="who_section">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="img-box">
                    <img src="images/who.jpg" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            Quem Somos?
                        </h2>
                    </div>
                    <p>
                        Colocar aqui texto
                    </p>
                    <div>
                        <a href="">
                            Saiba Mais
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="target_section layout_padding2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="detail-box">
                    <h2>
                        10+
                    </h2>
                    <h5>
                        Anos de Serviço
                    </h5>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="detail-box">
                    <h2>
                        200+
                    </h2>
                    <h5>
                        Projetos Entregues
                    </h5>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="detail-box">
                    <h2>
                        1000+
                    </h2>
                    <h5>
                        Clientes Satisfeitos
                    </h5>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="detail-box">
                    <h2>
                        1500+
                    </h2>
                    <h5>
                        Sapatos Restaurados
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>


<br><br><br><br><br><br>


<section class="client_section">
    <div class="container">
        <div class="heading_container">
            <h2>
                Feedback
            </h2>
        </div>
        <div class="carousel-wrap ">
            <div class="owl-carousel">
                <div class="item">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/c-1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Tempor iidunt <br>
                                <span>
                    Dipiscing elit
                  </span>
                            </h5>
                            <img src="images/quote.png" alt="">
                            <p>
                                Excelente serviço, foi tudo muito prático e rápido, uma semana e já tive o meu serviço pronto, recomendo 5 estrelas ★★★★★
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/c-2.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Tempor incididunt <br>
                                <span>
                    Dipiscing elit
                  </span>
                            </h5>
                            <img src="images/quote.png" alt="">
                            <p>
                                Foram muito atenciosos, viram o meu problema e resolveram num instante, quem me dera que todos fossem assim!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/c-3.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Tempor incididunt <br>
                                <span>
                    Dipiscing elit
                  </span>
                            </h5>
                            <img src="images/quote.png" alt="">
                            <p>
                                No início não estava com muita fé, mas como não tinha outra alternativa optei pelo CalçaAqui, melhor decisão impossível, Que trabalho bem feito ★★★★★
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

</section>


<!-- end target section -->


<!-- contact section -->



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
<script type="text/javascript" src="js/popup.js"></script>
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
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>
<?php


$conn -> close();
