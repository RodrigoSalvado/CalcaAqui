<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="./bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
    <link href="./responsive.css" rel="stylesheet" />
    <link href="./header.css" rel="stylesheet">
</head>

<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="../PaginaPrincipal/index.html">
        <span>
          Calça Aqui
        </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="../PaginaPrincipal/index.html">Página Principal <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../PaginaPrincipal/about.html"> Sobre Nós </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../PaginaPrincipal/do.html"> Serviços </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../PaginaPrincipal/portfolio.html"> Portfolio </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../PaginaPrincipal/contact.html">Contacte-nos</a>
                        </li>
                    </ul>
                    <div class="user_option">
                        <a href="">
                            <img src="../PaginaPrincipal/images/user.png" alt="">
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


<script type="text/javascript" src="../PaginaPrincipal/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../PaginaPrincipal/js/bootstrap.js"></script>
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