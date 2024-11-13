<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <?php include ('layouts/header.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zodiac</title>
</head>
<body class="container-5">
    <h1 class="text-center">Descubra o seu signo</h1>
    <form id="signo-form" class="mt-4" action="show_zodiac_sign.php" method="POST">
    <div class="form-group">
        <label for="data_nascimento">Data de nascimento: </label>
        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Descobrir</button>
    </form>
</body>
</html>