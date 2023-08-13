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
            <h1>Cadastre-se aluno</h1>
        </div>
        <div class="conteudo">
            <form action="./crudaluno.php" method="post">
                <div class="inputs">
                    <label for="inome">Nome:</label>
                    <input type="text" name="nome" id="inome">
                </div>
                <div class="inputs">
                    <label for="iendereco">Endereço:</label>
                    <input type="text" name="endereco" id="iendereco">
                </div>
                <div class="inputs metade">
                    <label for="iidade">Idade:</label>
                    <input type="number" name="idade" id="iidade">
                </div>


                <div class="inputs metade">
                    <label for="idatanascimento">Data de nascimento:</label>
                    <input type="date" name="datanascimento" id="idatanascimento">
                </div>
                <div class="inputs">
                    <label for="iestatus">Status:</label>
                    <select name="estatus" >
                        <option value="AP">Aprovado</option>
                        <option value="RP">Reprovado</option>
                        <option value="TR">Trancado</option>
                    </select>
                </div>

                <div class="inputs metade">
                    <input type="submit" class="butoes" id="cadastro" value="cadastrar" name="cadastrar">
                </div>

                <div class="inputs metade">
                    <a href="../../" class="butoes">Voltar</a>
                </div>

            </form>

        </div>

    </div>



</body>

</html>
