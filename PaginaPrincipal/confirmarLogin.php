<?php
    include("../basedados/db.h");

    session_start();

    $username = $_POST["username"];
    $_SESSION["username"] = $username;
    $password = $_POST["password"];
    $botao = $_POST["botao"];

    if(isset($botao)){
        if(isset($username, $password)){

            //consulta de password do user inserido
            $sqlSelect = "SELECT password FROM conta WHERE username = '".$_SESSION["username"]."'";
            $resultSelect = mysqli_query($conn, $sqlSelect);

            if($resultSelect->num_rows > 0){
                $row = $resultSelect->fetch_assoc();
                $pass = $row["password"];


                //cofirmacao de password
                if(md5($password) == $pass) {
                    //echo "<script>window.alert('password correta') ;</script>";
                    header("Location: PaginaPrincipal.php");
                }

            }else{
                echo "<script>window.alert('Dados de login invalidos!') ;</script>";
            }

        }else{
            echo "<script>window.alert('Preencha todos os campos') ;</script>";
        }
    }

    $conn -> close();

?>