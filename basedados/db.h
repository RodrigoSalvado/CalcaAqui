<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn , 'CalcaAqui');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}else{
    echo "Entrou na bd <hr>";
}
?>
