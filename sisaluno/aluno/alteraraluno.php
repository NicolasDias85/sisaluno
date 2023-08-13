<?php
// Código para conexão com o banco de dados (adapte as configurações de acordo com o seu ambiente)
require_once "../../conexao.php";

// Verifica se o ID do aluno foi fornecido
if (!isset($_GET["id"])) {
    // Redireciona de volta para a lista de alunos de alunos
    header("Location: listaluno.php");
    exit();
}

$id = $_GET["id"];

// Obtém os dados do aluno a serem alterados do banco de dados
$stmt = $conexao->prepare("SELECT * FROM aluno WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o aluno existe
if (!$aluno) {
    // Redireciona de volta para a lista de alunos de alunos
    header("Location: listaluno.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno</title>
    <link rel="stylesheet" href="../style/cadastro.css">
</head>

<body>

    <div class="box">
        <div class="titulo">
            <h1>Altere: <?php echo $aluno['nome']; ?></h1>
        </div>
        <div class="conteudo">
            <form action="./crudaluno.php" method="post">
                <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
                <div class="inputs">
                    <label for="inome">Nome:</label>
                    <input type="text" name="nome" id="inome" value="<?php echo $aluno['nome']; ?>">
                </div>
                <div class="inputs">
                    <label for="iendereco">Endereço:</label>
                    <input type="text" name="endereco" id="iendereco" value="<?php echo $aluno['endereco']; ?>">
                </div>
                <div class="inputs metade">
                    <label for="iidade">Idade:</label>
                    <input type="number" name="idade" id="iidade" value="<?php echo $aluno['idade']; ?>">
                </div>


                <div class="inputs metade">
                    <label for="idatanascimento">Data de nascimento:</label>
                    <input type="date" name="datanascimento" id="idatanascimento" value="<?php echo $aluno['datanascimento']; ?>">
                </div>
                <div class="inputs">
                    <label for="iestatus">Status:</label>
                    <select name="estatus">
                        <option value="<?php echo $aluno['estatus']; ?>"><?php echo $aluno['estatus']; ?></option>
                        <option value="AP">Aprovado</option>
                        <option value="RP">Reprovado</option>
                        <option value="TR">Trancado</option>
                    </select>
                </div>

                <div class="inputs metade">
                    <input type="submit" class="butoes" id="cadastro" value="alterar" name="alterar">
                </div>

                <div class="inputs metade">
                    <a href="./listaaluno.php" class="butoes">Voltar</a>
                </div>

            </form>

        </div>

    </div>



</body>

</html>