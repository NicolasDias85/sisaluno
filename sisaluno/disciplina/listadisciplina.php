<?php
// Requer o arquivo de conexão com o banco de dados
require_once "../../conexao.php";

// Prepara e executa a query para selecionar todas as disciplinas
$stmt = $conexao->prepare("SELECT * FROM disciplina");
$stmt->execute();
$disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Função para obter o nome do professor a partir do ID do professor
function getProfessorName($conexao, $idprofessor){
    $stmt = $conexao->prepare("SELECT nome FROM professor WHERE id = :id");
    $stmt->bindParam(':id', $idprofessor);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['nome'];
}
?>
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
                <th>Carga Horaria</th>
                <th>Semestre</th>
                <th>Professor</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Media</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
        foreach ($disciplinas as $disciplina) { ?>
            <tbody>
                <tr>
                    <td><?php echo $disciplina['id']; ?></td>
                    <td><?php echo $disciplina['nomedisciplina']; ?></td>
                    <td><?php echo $disciplina['ch']; ?></td>
                    <td><?php echo $disciplina['semestre']; ?></td>
                    <td><?php echo getProfessorName($conexao, $disciplina['idprofessor']); ?></td>
                    <td><?php echo $disciplina['Nota1']; ?></td>
                    <td><?php echo $disciplina['Nota2']; ?></td>
                    <td><?php echo $disciplina['Media']; ?></td>
                    <td>
                        <a class="alterar" href="alterardisciplina.php?id=<?php echo $disciplina['id']; ?>">Alterar</a>
                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $disciplina['id']; ?>)">Excluir</a>
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
            if (confirm("Tem certeza que deseja excluir este disciplina?")) {
                window.location.href = "./cruddisiplina.php?confirm=true&id=" + id;
            }
        }
    </script>
</body>
</html>