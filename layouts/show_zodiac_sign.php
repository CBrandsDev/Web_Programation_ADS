<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("layouts/header.php"); ?>
    <title>Seu Signo</title>
</head>
<body class="container mt-5">
    <h1 class="texte-center">Seu signo Zodiacal</h1>
    <?php
    $data_nascimento = $POST['data_nascimento'];
    $signos = simplexml_load_file["signos.xml"];

    function data_no_intervalo($data, $inicio, $fim) {
        $ano = date('Y');
        $data = DateTime::createFromFormat('Y-m-d', $data) -> setTime(0, 0);
        $inicio = DateTime::createFromFormat('d/m/Y', "$inicio/$ano") -> setTime(0, 0);
        $fim = DateTime::createFromFormat('d/m/Y', "$fim/$ano") -> setTime(0, 0);
        
        if($inicio > $fim) {
            $fim->modify('+1 year')
        }
        return ($data >= $inicio && $data <= $fim);
    }

    $signo_encontrado = null;
    foreach($signos->$signo as $signo) {
        if(data_no_intervalo($data_nascimento, (string) $signo->dataInicio, (string) $signo->dataFim)) {
            $signo_encontrado = $signo;
            break
        }
    }

    if($signo_encontrado):
    ?>
    <div class="text-center">
        <h2><?=$singo_encontrado->signoNome; ?></h2>
        <p><?=$signo_encontrado->descricao; ?></p>
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