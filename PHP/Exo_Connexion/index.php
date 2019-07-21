<?php 
session_start();

$message = "";

 if(!empty($_POST["pseudo"]) && !empty($_POST["password"])) {

    require 'classes/DbData.php';
   $data = new DbData();

   if($data->checkInputs($_POST["pseudo"],$_POST["password"])) {

    $_SESSION['username'] = $_POST["pseudo"];
    $message = <<< HTML
            <div class="alert alert-success">Vous êtes bien connecté !</div>
HTML;
   } else {

        $message = <<< HTML
            <div class="alert alert-danger">Vos identifiants sont incorrects !</div>
HTML;
   }
 } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <form action="index.php" method="POST" autocomplete="false" class="container">

        <div class="form-group">
            <label for="pseudo" class="font-weight-bold"> Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Entrez votre pseudo">
        </div>

        <div class="form-group">
            <label for="password" class="font-weight-bold"> Mot de passe :</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Entrez votre mot de passe">
        </div>

        <?= $message ?>

        <button type="submit" class="btn btn-primary float-right">Se connecter</button>

    </form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>