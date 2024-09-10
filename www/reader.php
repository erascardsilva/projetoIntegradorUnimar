<!-- Projeto Integrador - Erasmo Cardoso -->

<?php

require("./crud/read.php");

//  retorno em $suggestions que traz os dados do banco
$suggestions = read();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listar Sugestões</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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