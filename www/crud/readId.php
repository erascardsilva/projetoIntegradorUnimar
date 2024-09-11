<!-- Projeto Integrador --- Erasmo Cardoso -->

<?php

require("connect.php");

function readId()
{
    global $dbconn;

    if (!$dbconn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }

    // Inicializa o array 
    $response = [];

    // Verifica se a requisição é POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $response = ["status" => "error", "message" => "Método de requisição incorreto"];
        echo json_encode($response);
        exit;
    }

    // Obtém os dados
    parse_str(file_get_contents("php://input"), $data);

    // Verifica se o ID existe
    if (!isset($data['id']) || intval($data['id']) <= 0) {
        $response = ["status" => "error", "message" => "ID não fornecido ou inválido"];
        echo json_encode($response);
        exit;
    }

    $id = intval($data['id']); // Converte para inteiro


    $sql = "SELECT * FROM suggestions WHERE id = $id";
    $result = mysqli_query($dbconn, $sql);

    // Inicializa o array 
    $suggestions = [];

    // Adiciona os dados
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $suggestions[] = $row;
        }
    }

    mysqli_close($dbconn);

    // Verifica se o registro existe
    if (empty($suggestions)) {
        $response = ["status" => "error", "message" => "Nenhum registro encontrado para o ID fornecido"];
    } else {
        $response = ["status" => "success", "data" => $suggestions];
    }


    echo json_encode($response);
}

// Executa 
readId();
