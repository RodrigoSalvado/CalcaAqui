<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
   

    try {
        $conn = new mysqli($db_server, $db_user, $db_pass);
        mysqli_select_db($conn, "testedb");
    }
    catch (mysqli_sql_exception) {
    }
   
?>

<?php
/* Criar login
include("database.php");

$sql = "SELECT FROM users(user,password) VALUES ($mail, $password)";

if(isset($_POST["login"])){

    $mail = $_POST["mail"];
    $password = $_POST["password"];

    if(empty($mail)){
        echo"Nome de utilizador ou email não preenchido!";
    }
    elseif(empty($password)){
        echo"password não preenchido!";
    }
    else{
        echo"Hello $mail";
    }

}
mysqli_close($conn);
*/
?>
  
