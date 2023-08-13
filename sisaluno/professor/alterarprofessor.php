<?php
// Código para conexão com o banco de dados (adapte as configurações de acordo com o seu ambiente)
require_once "../../conexao.php";

// Verifica se o ID do professor foi fornecido
if (!isset($_GET["id"])) {
    // Redireciona de volta para a lista de professors de professors
    header("Location: listprofessor.php");
    exit();
}

$id = $_GET["id"];

// Obtém os dados do professor a serem alterados do banco de dados
$stmt = $conexao->prepare("SELECT * FROM professor WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$professor = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o professor existe
if (!$professor) {
    // Redireciona de volta para a lista de professors de professors
    header("Location: listprofessor.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor</title>
    <link rel="stylesheet" href="../style/cadastro.css">
</head>
<body>

    <div class="box">
        <div class="titulo"><h1>Altere: <?php echo $professor['nome']; ?></h1></div>
        <div class="conteudo">
            <form action="./crudprofessor.php" method="post">
            <input type="hidden" name="id" value="<?php echo $professor['id']; ?>">
                <div class="inputs">
                    <label for="inome">Nome:</label>
                    <input type="text" name="nome" id="inome" value="<?php echo $professor['nome']; ?>">
                </div>
                <div class="inputs">
                    <label for="iendereco">Endereço:</label>
                    <input type="text" name="endereco" id="iendereco" value="<?php echo $professor['endereco']; ?>">
                </div>
                <div class="inputs">
                    <label for="icpf">CPF:</label>
                    <input type="number" name="cpf" id="icpf" value="<?php echo $professor['cpf']; ?>">
                </div>
                <div class="inputs metade">
                    <label for="iidade">Idade:</label>
                    <input type="number" name="idade" id="iidade" value="<?php echo $professor['idade']; ?>">
                </div>
                <div class="inputs metade">
                    <label for="idatanascimento">Data de nascimento:</label>
                    <input type="date" name="datanascimento" id="idatanascimento" value="<?php echo $professor['datanascimento']; ?>">
                </div>
                <div class="inputs">
                    <label for="iestatus">Status:</label>
                    <select name="estatus">
                        <option value="<?php echo $professor['estatus']; ?>"><?php echo $professor['estatus']; ?></option>
                        <option value="ativo">ativo</option>
                        <option value="desativo">desativo</option>
                    </select>
                </div>

                <div class="inputs metade">
                    <input type="submit" class="butoes" id="cadastro" value="alterar" name="alterar">
                </div>
                
                <div class="inputs metade">
                    <a href="./listaprofessor.php" class="butoes">Voltar</a>
                </div>


            </form>

        </div>

    </div>


    
</body>
</html>

