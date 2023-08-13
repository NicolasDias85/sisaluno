<?php
require_once "../../conexao.php";
// Prepara e executa a query para selecionar todos os professores
$stmt = $conexao->prepare("SELECT id, nome FROM professor");
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_GET["id"])) {
    // Redireciona de volta para a página principal de disciplinas
    header("Location: listadisciplina.php");
    exit();
}
  
  $id = $_GET["id"];
// Obtém os dados da disciplina a serem alterados do banco de dados
$stmt = $conexao->prepare("SELECT * FROM disciplina WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$disciplina = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disciplina</title>
    <link rel="stylesheet" href="../style/cadastro.css">
</head>

<body>

    <div class="box">
        <div class="titulo">
            <h1>Cadastro disciplina</h1>
        </div>
        <div class="conteudo">
            <form action="./cruddisiplina.php" method="post">
            <input type="hidden" name="id" value="<?php echo $disciplina['id']; ?>">
            <div class="inputs">
                    <label for="inome">Nome:</label>
                    <input type="text" name="nomedisciplina" id="inome" value="<?php echo $disciplina['nomedisciplina']; ?>">
                </div>

                <div class="inputs">
                    <label for="icarga">Carga horária:</label>
                    <input type="number" name="ch" id="icarga" value="<?php echo $disciplina['ch']; ?>">
                </div>


                <div class="inputs metade">
                    <label for="isemestre">Semestre:</label>
                    <input type="text" name="semestre" id="isemestre" value="<?php echo $disciplina['semestre']; ?>">
                </div>

                <div class="inputs metade">
                    <label for="iidprofessor">ID Professor:</label>

                    <select name="idprofessor">
                        <?php foreach ($professores as $professor) { ?>
                            <option value="<?php echo $professor['id']; ?>"><?php echo $professor['nome']; ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="inputs metade">
                    <label for="nota1">Nota1:</label>
                    <input type="number" name="nota1" id="nota1" value="<?php echo $disciplina['Nota1']; ?>">
                </div>

                <div class="inputs metade">
                    <label for="nota2">Nota2:</label>
                    <input type="number" name="nota2" id="nota2" value="<?php echo $disciplina['Nota2']; ?>">
                </div>

                <div class="inputs metade">
                    <input type="submit" class="butoes" id="cadastro" value="Alterar" name="alterar">
                </div>

                <div class="inputs metade">
                    <a href="./listadisciplina.php" class="butoes">Voltar</a>
                </div>
            </form>

        </div>

    </div>



</body>

</html>

<!-- <div class="caixa_form">
    <a class="voltar" href="index.php">Gerenciar Aluno</a>
        <h1>Inserir Aluno</h1>
        <form method="post" action="inserir.php">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" required>
          <label for="idade">Idade:</label>
          <input type="number" id="idade" name="idade" required>
          <label for="datanascimento">Data de Nascimento:</label>
          <input type="date" id="datanascimento" name="datanascimento" required>
          <label for="endereco">Endereço:</label>
          <input type="text" id="endereco" name="endereco" required>
          <label for="status">Status:</label>
          <select name="status" id="status" required>
            <option value="AP">Aprovado</option>
            <option value="RP">Reprovado</option>
            <option value="TP">Trancado</option>
          </select>
          <input type="submit" value="Inserir">  -->