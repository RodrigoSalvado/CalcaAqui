<?php
global $conn;
include("../basedados/db.h");

$username = $_POST["username"];
$tipo_servico = $_POST["tipo_servico"];
$botao = $_POST["botao"];
$descricao = $_POST["descricao"];
$tipo_calcado = $_POST["tipo_calcado"];
$foto = $_FILES["imagem"];

if(isset($botao)) {

    // Verificar se a imagem foi enviada corretamente
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Ler o conteúdo da imagem
        $foto = file_get_contents($_FILES['foto']['tmp_name']);
        // Escapar a imagem para evitar SQL Injection
        $foto = $conn->real_escape_string($foto);
    }


    echo "Username: ".$username."<br>";
    echo "Tipo Servico: ".$tipo_servico."<br>";
    echo "Descricao: ".$descricao."<br>";
    echo "Tipo Calcado: ".$tipo_calcado."<br>";

    $sql = "SELECT id_utilizador FROM utilizador WHERE username = '$username';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }

    $id_utilizador = $row["id_utilizador"];

    echo "Id: ".$id_utilizador."<br>";


    $sql = "INSERT INTO `pedido_reparacao`(`id_utilizador`, `descricao`, `servico`, `calcado`, `foto`) VALUES 
                                        ('$id_utilizador', '$descricao', '$tipo_servico', '$tipo_calcado', '$foto')";

    $resultInsert = $conn->query($sql);

    if($resultInsert){
        echo "O seu pedido foi criado com sucesso!";
        header("Location: PaginaPrincipal.php");

    }else{
        echo "<script>window.alert('Não foi possivel criar o pedido! Tente novamente.') ;</script>";
    }



}

    $conn -> close();
?>
