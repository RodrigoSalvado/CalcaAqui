<?php
    //ligacao a base de dados
    global $conn;
    include("../basedados/db.h");
    session_start();
//user
echo $_SESSION["username"];


    $nome = "";
    $username = "";
    $email = "";

    $user_logado = $_SESSION["username"];
    $sqlSelect = "SELECT nome, username, email FROM conta WHERE username = '$user_logado'";
    $resultSelect = mysqli_query($conn, $sqlSelect);

    if($resultSelect -> num_rows > 0){
        while($row = $resultSelect->fetch_assoc()){
            $nome = $row["nome"];
            $username = $row["username"];
            $email = $row["email"];


        }

    }else{
        echo "<script>window.alert('Não foram encontrados resultados') ;</script>";
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

    <title>Perfil do Cliente</title>
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

                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>

    <div class="informacoes">
        <h2>Informações pessoais:</h2>
        <div class="campos-user">
            <label for=""><?php echo $nome; ?></label><br>
            <label for=""><?php echo $username; ?></label><br>
            <label for=""><?php echo $email; ?></label>
        </div>

        <div class="pedidos">
                <h2>Os meus pedidos:</h2>
            <?php

                //id do user que fez o login
                $sql = "SELECT id_utilizador FROM utilizador WHERE username = '$user_logado'";
                $result = mysqli_query($conn, $sql);

                if($result -> num_rows > 0){
                    $rowId = $result -> fetch_assoc();
                    $idUserLogado = $rowId["id_utilizador"];
                    //echo $idUserLogado;

                    //dados do(s) pedido(s) do user que fez o login
                    $sqlPedido = "SELECT id_pedido, servico, status_pedido FROM pedido_reparacao WHERE id_utilizador = '$idUserLogado'";
                    $resultPedido = mysqli_query($conn, $sqlPedido);

                    if($resultPedido -> num_rows > 0){
                        while($rowPedido = $resultPedido -> fetch_assoc()){
                            $id_pedido = $rowPedido["id_pedido"];
                            $servico = $rowPedido["servico"];
                            $status_pedido = $rowPedido["status_pedido"];


                            echo "<button class='pedido' onclick='window.location.href=\"pedidoDetalhado.php?id_pedido=$id_pedido\"' style='border: none;'>
                                    <label class='campos' id='id'>$id_pedido</label>
                                    <label class='campos' id='servico'>$servico</label>
                                    <label class='campos' id='estado'>$status_pedido</label>
                                  </button>";
                        }
                    }else{
                        if($resultPedido -> num_rows == 0){
                            echo "ainda nao realizou nenhum pedido";
                        }else{
                            echo "erro ao realizar o select";
                        }
                    }

                    }else{
                         echo "erro";
                    }
            ?>

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