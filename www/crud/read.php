<!-- Projeto Integrador --- Erasmo Cardoso -->


<?php

require("connect.php");

function read()
{
    global $dbconn;
    if (!$dbconn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    };

    $sql = "SELECT * FROM suggestions";
    $dados = mysqli_query($dbconn, $sql);

    $suggestions = [];

    // Incrementa o array com os resultados
    if (mysqli_num_rows($dados) > 0) {
        while ($row = mysqli_fetch_assoc($dados)) {
            $suggestions[] = $row;
        }
    }

    mysqli_close($dbconn);
    return $suggestions;  // Retorna o array 
}
