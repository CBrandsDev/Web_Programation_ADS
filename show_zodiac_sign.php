<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include('layouts/header.php'); ?>
    <title>Seu Signo</title>
</head>
<body class="container mt-5">
    <h1 class="text-center">Seu Signo Zodiacal</h1>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Verifica se a data de nascimento foi enviada
    if (isset($_POST['data_nascimento'])) {
        $data_nascimento = $_POST['data_nascimento'];
    } else {
        die("Data de nascimento não fornecida.");
    }

    // Carrega o arquivo XML
    $signos = simplexml_load_file("signos.xml");
    if (!$signos) {
        die("Erro ao carregar o arquivo signos.xml.");
    }

    // Função para verificar se a data de nascimento está dentro do intervalo de um signo
    function data_no_intervalo($data, $inicio, $fim) {
        $ano = date('Y');
        $data = DateTime::createFromFormat('Y-m-d', $data)->setTime(0, 0);
        $inicio = DateTime::createFromFormat('d/m/Y', "$inicio/$ano")->setTime(0, 0);
        $fim = DateTime::createFromFormat('d/m/Y', "$fim/$ano")->setTime(0, 0);

        // Caso o fim do intervalo seja menor que o início, adiciona um ano ao fim
        if ($inicio > $fim) {
            $fim->modify('+1 year');
        }
        return ($data >= $inicio && $data <= $fim);
    }

    $signo_encontrado = null;
    foreach ($signos->signo as $signo) {
        if (data_no_intervalo($data_nascimento, (string) $signo->dataInicio, (string) $signo->dataFim)) {
            $signo_encontrado = $signo;
            break;
        }
    }

    // Exibe as informações do signo encontrado ou uma mensagem de erro
    if ($signo_encontrado):
    ?>
        <div class="text-center">
            <h2><?= htmlspecialchars($signo_encontrado->signoNome); ?></h2>
            <p><?= htmlspecialchars($signo_encontrado->descricao); ?></p>
            <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
        </div>
    <?php else: ?>
        <p class="text-center text-danger">Signo não encontrado. Verifique a data de nascimento.</p>
        <div class="text-center">
            <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
        </div>
    <?php endif; ?>
</body>
</html>
