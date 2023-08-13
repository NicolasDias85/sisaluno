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
                <th>Idade</th>
                <th>Data de Nascimento</th>
                <th>Endereço</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <?php

        require_once "../../conexao.php";

        $sql = "SELECT * FROM aluno";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($alunos as $aluno) { ?>
            <tbody>
                <tr>
                    <td><?php echo $aluno['id']; ?></td>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['idade']; ?></td>
                    <td><?php echo $aluno['datanascimento']; ?></td>
                    <td><?php echo $aluno['endereco']; ?></td>
                    <td><?php echo $aluno['estatus']; ?></td>
                    <td>
                        <a class="alterar" href="alteraraluno.php?id=<?php echo $aluno['id']; ?>">Alterar</a>
                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $aluno['id']; ?>)">Excluir</a>
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
            if (confirm("Tem certeza que deseja excluir este aluno?")) {
                window.location.href = "./crudaluno.php?confirm=true&id=" + id;
            }
        }
    </script>

</body>

</html>