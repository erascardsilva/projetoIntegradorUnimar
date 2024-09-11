<!-- Projeto Integrador --- Erasmo Cardoso -->

<?php

require('./crud/connect.php');

function updateID($id)
{
    global $dbconn;

    if (!$dbconn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }

    $id = intval($id);
    $stmt = $dbconn->prepare("SELECT * FROM suggestions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Nenhuma sugestão encontrada com esse ID.");
    }

    $suggestion = $result->fetch_assoc();

    $stmt->close();
    mysqli_close($dbconn);

    return $suggestion;
}
