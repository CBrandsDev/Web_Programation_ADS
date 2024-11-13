<!DOCTYPE html>
<html lang="en">
<?php include ('header.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zodiac</title>
</head>
<body class="container">
    <h1 class="text-center">Descubra o seu signo</h1>
    <form ide="signo-form" class="mt-4" action="show_zodiac_sign.php" method="post">
    <div class="form-group">
        <label for="data_nascimento">Data de nascimento: </label>
        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Descobrir</button>
    </form>
</body>
</html>