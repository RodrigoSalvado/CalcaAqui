<?php
    global $conn;
    include("../basedados/db.h");

    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];


    $botao = $_POST["botao"];

    if(isset($botao)){
        if(isset($username) && isset($password)){




            //Selecionar user correspondente da base de dados
            $sql = "SELECT * FROM conta WHERE username = '$username' AND password = '".md5($password)."';";
            $retval = mysqli_query( $conn, $sql );
            if(! $retval ){
                die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
            }
            $row = mysqli_fetch_array($retval);

            //==================================================================//
            if(strcmp($row["username"], $username) == 0 && strcmp($row["password"], md5($password)) == 0){
                //=========================DADOS VÁLIDOS=========================//
                //Identifica o utilizador
                $_SESSION["user"] = $row["username"];
                $_SESSION["tipo"] = $row["tipo_utilizador"];
                header("Location: index.php");
            }else{
                $_SESSION["user"] = -1;
                $_SESSION["tipo"] = -1;
                echo "<script>window.alert('Dados de login inválidos') ;window.location.href = 'login.php';</script>";

            }

        }else{

            session_destroy();
            header("refresh:0;url = ./paginaPrincipal.php");

        }
    }

    $conn -> close();

?>