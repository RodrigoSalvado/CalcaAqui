<?php
    global $conn;
    include("../basedados/db.h");

    session_start();

    if (isset($_POST['botao'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = $_POST['password'];
    
            
            $sqlSelect = "SELECT password, tipo_utilizador FROM conta WHERE username = '$username'";
            $resultSelect = mysqli_query($conn, $sqlSelect);
    
            if ($resultSelect && $resultSelect->num_rows > 0) {
                $row = $resultSelect->fetch_assoc();
                $hashed_password = $row['password'];
                $tipo_user = $row['tipo_utilizador'];
    
                
                if (md5($password) == $hashed_password) {
                    
                    $_SESSION['user'] = [
                        'nome' => $username,
                        'tipo_user' => $tipo_user
                    ];
    
                    
                    if ($tipo_user == 1) {
                        header("Location: admin.php");
                    } elseif ($tipo_user == 2) {
                        header("Location: perfilCliente.php");
                    } else {
                        echo "<script>window.alert('Dados de login inválidos!');</script>";
                    }
                    exit(); 
                } else {
                    echo "<script>window.alert('Senha inválida!');</script>";
                }
            } else {
                echo "<script>window.alert('Usuário não encontrado!');</script>";
            }
        } else {
            echo "<script>window.alert('Preencha todos os campos');</script>";
        }
    }
    $conn -> close();

?>