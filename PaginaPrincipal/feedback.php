<?php
session_start();
global $conn;
include("../basedados/db.h");

$user = $_GET["id"] ?? $_SESSION["user"];
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

        <title>Feedback</title>

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
        <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
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
                                if(isset($_SESSION["user"]) && $_SESSION["tipo"] == 1){
                                    echo '
                                        <a href="admin.php">
                                            <img src="images/user.png" alt="">   
                                            <span style="text-decoration: none; color: white">' . htmlspecialchars($user) . '</span>                                    
                                        </a>
                                        <a href="logout.php">
                                            <img id="logout" src="images/logout.png" alt="" style="width: 25px; margin-left: 20px">
                                        </a>
                                    ';
                                }else if(isset($_SESSION["user"]) && $_SESSION["tipo"] == 2){

                                    echo '
                                        <a href="perfilCliente.php">
                                            
                                            <img src="images/user.png" alt="">   
                                            <span style="text-decoration: none; color: white">' . htmlspecialchars($user) . '</span>                                    
                                        </a>
                                        <a href="logout.php">
                                            <img id="logout" src="images/logout.png" alt="" style="width: 25px; margin-left: 20px">
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






    <div class="feedback-container">
        <div class="wrapper-feedback">
            <h3>Deixe o seu Feedback</h3>
            <form action="" method="post">
                <div class="rating">
                    <input type="number" name="rating" hidden>
                    <i class='bx bx-star star' style="--i: 0;"></i>
                    <i class='bx bx-star star' style="--i: 1;"></i>
                    <i class='bx bx-star star' style="--i: 2;"></i>
                    <i class='bx bx-star star' style="--i: 3;"></i>
                    <i class='bx bx-star star' style="--i: 4;"></i>
                </div>
                <textarea name="feedback" cols="30" rows="5" placeholder="Deixe a sua opinião..." required></textarea>
                <div class="btn-group">
                    <a><button type="submit" class="btn submit" name="submit">Enviar</button></a>
                </div>
            </form>
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

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/feedback.js"></script>
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




if(isset($_POST["submit"]) && isset($_POST["feedback"])){
    if(empty($_POST["rating"])){
        echo "<script>alert('Dê uma classifição de estrelas!')</script>";
    }else{
        $feedback = $_POST["feedback"];
        $rating = $_POST["rating"];

        $sqlUser = "SELECT id_utilizador FROM utilizador WHERE username = '$user'";
        $resultUser = mysqli_query($conn, $sqlUser);


        if(mysqli_num_rows($resultUser)>0) {
            while ($row = mysqli_fetch_assoc($resultUser)) {
                $id = $row["id_utilizador"];
            }
        }

        $sql = "INSERT INTO feedback (id_utilizador, feedback, rating) VALUES ($id, '$feedback', $rating)";

        $conn -> query($sql);

        echo "<script>alert('Feedback Enviado')</script>";
        header("Location: PaginaPrincipal.php");
    }

}

$conn -> close();