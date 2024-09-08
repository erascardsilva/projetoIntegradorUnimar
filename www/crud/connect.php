<!-- Projeto Integrador - Erasmo Cardoso
Conexao com banco de dados local -->

<?php  
    $servername = "db" ;
    $database = "projintegrador";
    $username = "root";
    $password = "3727";

    $dbconn = mysqli_connect($servername, $username, $password, $database);

    if (! $dbconn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }   

//    mysqli_close($dbconn);