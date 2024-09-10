<!-- Projeto Integrador --- Erasmo Cardoso -->

<?php

require("connect.php");
// função READ
function read()
{
    global $dbconn;
    if (!$dbconn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    };

    $sql = "SELECT * FROM suggestions";

    $dados = mysqli_query($dbconn, $sql);

    $suggestions = [];

    // incrementa o array
    if (mysqli_num_rows($dados) > 0) {
        while ($row = mysqli_fetch_assoc($dados)) {
            $suggestions[] = $row;
        }
    }

    mysqli_close($dbconn);
    echo json_encode($suggestions);
}

// execulta read
read();
