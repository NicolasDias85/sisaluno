<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/lista.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Idade</th>
                <th>CPF</th>
                <th>Data de nascimento</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php

        require_once "../../conexao.php";

        $sql = "SELECT * FROM professor";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $professors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($professors as $professor) { ?>
            <tbody>
                <tr>
                    <td><?php echo $professor['id']; ?></td>
                    <td><?php echo $professor['nome']; ?></td>
                    <td><?php echo $professor['endereco']; ?></td>
                    <td><?php echo $professor['idade']; ?></td>
                    <td><?php echo $professor['cpf']; ?></td>
                    <td><?php echo $professor['datanascimento']; ?></td>
                    <td><?php echo $professor['estatus']; ?></td>
                    <td>
                        <a class="alterar" href="alterarprofessor.php?id=<?php echo $professor['id']; ?>">Alterar</a>
                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $professor['id']; ?>)">Excluir</a>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
    <div class="inicio">
        <a href="../../index.html">Voltar</a>
    </div>
    <script>
        function confirmDelete(id) {
            if (confirm("Tem certeza que deseja excluir este professor?")) {
                window.location.href = "./crudprofessor.php?confirm=true&id=" + id;
            }
        }
    </script>
    
</body>
</html>