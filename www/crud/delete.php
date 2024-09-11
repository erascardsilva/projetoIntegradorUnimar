<!-- Projeto Integrador --- Erasmo Cardoso -->

<?php
require_once("connect.php");

// Verifica se o ID foi passado pela URL
if (isset($_GET['id'])) {
    // Obtém o ID 
    $id = intval($_GET['id']);

    if ($id) {
        // Prepara e executa a consulta 
        $sql = "DELETE FROM suggestions WHERE id = ?";
        $stmt = mysqli_prepare($dbconn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'i', $id);
            if (mysqli_stmt_execute($stmt)) {
                echo "<center><h1>Apagado com sucesso</h1>";
                echo "<a href='../reader.php'><input type='button' value='Voltar'></a></center>";
            } else {
                echo "Erro ao apagar sugestão: " . mysqli_error($dbconn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Erro na preparação da consulta: " . mysqli_error($dbconn);
        }
    } else {
        echo "ID inválido.";
    }

    mysqli_close($dbconn);


    exit;
} else {
    echo "ID não especificado.";
}
