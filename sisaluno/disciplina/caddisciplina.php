<?php
require_once "../../conexao.php";
// Prepara e executa a query para selecionar todos os professores
$stmt = $conexao->prepare("SELECT id, nome FROM professor");
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                <div class="inputs">
                    <label for="inome">Nome:</label>
                    <input type="text" name="nomedisciplina" id="inome">
                </div>

                <div class="inputs">
                    <label for="icarga">Carga horária:</label>
                    <input type="number" name="ch" id="icarga">
                </div>


                <div class="inputs metade">
                    <label for="isemestre">Semestre:</label>
                    <input type="text" name="semestre" id="isemestre">
                </div>

                <div class="inputs metade">
                    <label for="iidprofessor">ID Professor:</label>

                    <select name="idprofessor">
                        <option value="">Selecione um professor</option>
                        <?php foreach ($professores as $professor) { ?>
                            <option value="<?php echo $professor['id']; ?>"><?php echo $professor['nome']; ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="inputs metade">
                    <label for="nota1">Nota1:</label>
                    <input type="number" name="nota1" id="nota1">
                </div>

                <div class="inputs metade">
                    <label for="nota2">Nota2:</label>
                    <input type="number" name="nota2" id="nota2">
                </div>

                <div class="inputs metade">
                    <input type="submit" class="butoes" id="cadastro" value="Cadastrar" name="cadastrar">
                </div>

                <div class="inputs metade">
                    <a href="../../index.html" class="butoes">Voltar</a>
                </div>
            </form>

        </div>

    </div>



</body>

</html>