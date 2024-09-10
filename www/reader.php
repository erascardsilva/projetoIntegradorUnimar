<!-- Projeto Integrador --- Erasmo Cardoso -->

<?php
// Conexão com o banco de dados
require("./crud/connect.php");

// Função para obter todas as sugestões
function allmessage()
{
    global $dbconn;

    if (!$dbconn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM suggestions";
    $result = mysqli_query($dbconn, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($dbconn));
    }

    $suggestions = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($dbconn);

    return $suggestions;
}

// Obtém tudo
$suggestions = allmessage();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listar Sugestões</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Dados do banco de dados</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>WhatsApp</th>
                    <th>Tipo</th>
                    <th>Mensagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($suggestions)): ?>
                    <?php foreach ($suggestions as $suggestion): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($suggestion['id']); ?></td>
                            <td><?php echo htmlspecialchars($suggestion['nome']); ?></td>
                            <td><?php echo htmlspecialchars($suggestion['email']); ?></td>
                            <td><?php echo htmlspecialchars($suggestion['whatsapp']); ?></td>
                            <td><?php echo htmlspecialchars($suggestion['suggestion_type']); ?></td>
                            <td><?php echo htmlspecialchars($suggestion['suggestion']); ?></td>
                            <td>
                                <a href="updatepag.php?id=<?php echo htmlspecialchars($suggestion['id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="./crud/delete.php?id=<?php echo htmlspecialchars($suggestion['id']); ?>" class="btn btn-danger btn-sm">Apagar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Nenhuma sugestão encontrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="index.html" class="btn btn-primary">Voltar</a>
    </div>
</body>

</html>