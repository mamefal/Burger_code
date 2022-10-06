<?php

include 'database.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Mame</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text:css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <h1 class="text_logo"><span class="glyphicon glyphicon-cutlery"></span>
        Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">
        <div class="row">
            <h1><strong>Liste des items </strong><a href="insert.php" class="btn btn-success btn-lg"><span
                        class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
            <table class="table table-striped table-bordered"></table>

        </div>

    </div>

</body>

</html>