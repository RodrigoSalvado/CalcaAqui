<?php // Ligação à bd

global $conn;
include("../basedados/db.h");
include("./enviarMail.php");
session_start();


$user_logado = $_SESSION["user"];
$sqlSelect = "SELECT nome, username, email FROM conta WHERE username = '$user_logado'";
$resultSelect = mysqli_query($conn, $sqlSelect);

if($resultSelect -> num_rows > 0){
    while($rowUser = $resultSelect->fetch_assoc()){
        $nome = $rowUser["nome"];
        $username = $rowUser["username"];
        $email = $rowUser["email"];

    }

}else{
    echo "<script>window.alert('Não foram encontrados resultados') ;</script>";
}

$id = $_GET["id"];

try{
    if(isset($_GET["submit-notas"])){
        $n = $_GET["notas"];

        $sql = "UPDATE pedido_reparacao SET notas = '$n' WHERE id_pedido = $id";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Adicionou notas ao pedido');</script>";
        header("Refresh:0; url=pedidoDetalhado_admin.php?id=".$id);

    }
}catch(Exception $ex){

}
try{
    if(isset($_GET["submit-status"])){
        $st = $_GET["status"];


        $sqlUser = "SELECT u.email, u.username FROM pedido_reparacao pr INNER JOIN utilizador u ON pr.id_utilizador = u.id_utilizador WHERE pr.id_pedido = $id";
        $resultMail = mysqli_query($conn, $sqlUser);

        if($resultMail -> num_rows > 0){
            while($rowMail = $resultMail->fetch_assoc()){
                $mailUser = $rowMail["email"];
                $user = $rowMail["username"];
            }

        }

        $sqlStatus = "SELECT id FROM status WHERE status = '$st'";
        $resultStatus = mysqli_query($conn, $sqlStatus);

        if($resultStatus -> num_rows > 0){
            while($rowStatus = $resultStatus->fetch_assoc()){
                $estado = $rowStatus["id"];
            }
        }

        $sql = "UPDATE pedido_reparacao SET status_pedido = '$st' WHERE id_pedido = $id";
        $result = mysqli_query($conn, $sql);

        if($estado == 2){
            $mail->addAddress($mailUser);
            $mail -> addEmbeddedImage('images/scissorsamarelo.png', 'logo');
            $mail->Subject = "O Seu Pedido Foi Aceite";
            $mail->Body = "<html>Olá ".$user.", <br> Vimos por este meio informar que o seu pedido foi aceite e entrará em processo de reparação.
            <br><br> Cumprimentos Calça Aqui.<br><br><br>
            <img src='cid:logo' style='width: 175px'></html>";

            $mail->send();

        }else if($estado == 3){
            $mail->addAddress($mailUser);
            $mail -> addEmbeddedImage('images/scissorsamarelo.png', 'logo');
            $mail->Subject = "O Seu Pedido Está Concluído";
            $mail->Body = "<html>Olá ".$user.", <br>A reparação do seu pedido encontra-se concluida, para poder levantar o seu pedido diriga-se à loja. <br><br>
            <a href='http://localhost/CalcaAqui/PaginaPrincipal/feedback.php?id=".$username."'>Envie Feedback</a>
            <br><br>Cumprimentos  Calça Aqui <br><br><br>
            <img src='cid:logo' style='width: 175px'></html>";

            $mail->send();

        }else if($estado == 4){
            $mail->addAddress($mailUser);
            $mail -> addEmbeddedImage('images/scissorsamarelo.png', 'logo');
            $mail->Subject = "O Seu Pedido Foi Recusado";
            $mail->Body = "<html>Lamentamos ".$user.",mas não iremos avançar com a reparação do seu pedido.<br><br> 
            Cumprimentos Calça Aqui.<br><br><br>
            <img src='cid:logo' style='width: 175px'></html>";

            $mail->send();
        }





        echo "<script>alert('O estado foi atualizado para ".$st."');</script>";
        header("Location: pedidoDetalhado_admin.php?id=".$id);
    }
}catch(Exception $ex){

}


$sql = "SELECT * FROM pedido_reparacao WHERE id_pedido = $id";
$result = mysqli_query($conn, $sql);

if($result -> num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idUser = $row["id_utilizador"];
        $descricao = $row["descricao"];
        $notas = $row["notas"];
        $status = $row["status_pedido"];
        $foto = $row["foto"];
    }
}

$sqlDados = "SELECT username, email, nome FROM conta WHERE id_utilizador = '$idUser'";
$resultDados = mysqli_query($conn, $sqlDados);
if(mysqli_num_rows($resultDados)){
    while($rowDados = mysqli_fetch_assoc($resultDados)){
        $userPedido = $rowDados["username"];
        $emailPedido = $rowDados["email"];
        $nomePedido = $rowDados["nome"];
    }
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

    <title>Calça Aqui</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
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
<img src="images/scissors.png" style="width: 80px">            </span>
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
                                <a class="nav-link" href="servicos.php"> Serviços </a>
                            </li>
                            <
                        </ul>
                        <div class="user_option">
                            <?php
                            if(isset($_SESSION["user"]) && $_SESSION["tipo"] == 1){
                                echo '
                                        <a href="admin.php">
                                            <img src="images/user.png" alt="">   
                                            <span style="text-decoration: none; color: white">' . htmlspecialchars($user_logado) . '</span>                                    
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
                                            <span style="text-decoration: none; color: white">' . htmlspecialchars($user_logado) . '</span>                                    
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

<div class="info-pedido">
    <div class="linha1">
        <h2>Pedido de reparação:</h2>
        <br><br>
        <?php echo "<img src='./images/$foto' alt='imagem sapato' width='150px' height='150px'>";?>
        <label>Estado do pedido: </label>
        <label>
                <form method="get" action="">
                    <?php
                    $sqlSt = "SELECT cor FROM status WHERE status = '$status'";
                    $resultSt = mysqli_query($conn, $sqlSt);
                    if(mysqli_num_rows($resultSt)>0){
                        $row = mysqli_fetch_assoc($resultSt);
                        $cor = $row["cor"];
                    }
                    echo '<select name="status" style="background-color: '.$cor.'" >';
                        $sql = "SELECT status FROM status";
                        $result = $conn->query($sql);

                        echo "<option style='background-color: white'>$status</option>";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if($row["status"] != $status){
                                    echo "<option style='background-color: white'>" . $row["status"] . "</option>";

                                }
                            }
                        }

                        echo "</select>";
                        ?>

                    <?php echo "<input type='text' name='id' value='".$id."' hidden/>"?>
                    <button class="open-btn" type="submit" name="submit-status" >&plus;</button>
                </form>
        </label>

    </div>
    <div class="linha2">
        <div class="labels">
            <label class="campos">Descrição do pedido:</label>
            <label class="campos_admin">Notas do pedido:</label>
        </div>
        <div class="descricoes">
            <label class="desc_admin"> <?php
                    echo $descricao;
                ?></label>
            <label class="desc_admin"><?php
                    echo $notas;
                ?> <button id="show-popup">&plus;</button></label>
        </div>
    </div>
    <div class="popup">
        <button class="close-btn">&times;</button>
        <form method="get" action="">
            <h5>
                Coloque aqui as notas sobre o calçado:</br>
            </h5>
            <textarea name="notas"><?php
                    echo $notas;
                ?></textarea>
           <?php echo "<input type='text' name='id' value='".$id."' hidden/>"?>
            <input type="submit" name="submit-notas" value="Adicionar Notas" id="enviarNotas">
        </form>
    </div>
    <div class="linha3">
        <h4>Dados do cliente:</h4>
        <label class="campos2">Nome: <?php echo $nomePedido; ?></label><br>
        <label class="campos2">Username: <?php echo $userPedido; ?></label><br>
        <label class="campos2">Email: <?php echo $emailPedido; ?></label>
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
                        Dedicados em satisfazer as necessidades dos nossos clientes!
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

<script type="text/javascript" src="js/popup.js"></script>
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
