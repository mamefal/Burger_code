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
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                

                    <?php
                    $statement = $bdd->query('SELECT * FROM items INNER JOIN categories WHERE items.category = categories.id');
            
                    while($donnees = $statement->fetch())
                    {

                    ?>
                    <?php
                        echo'<tr>';
                        echo'<td>' . $donnees['name'] . '</td>';
                        echo'<td>' . $donnees['description'] . '</td>';
                        echo'<td>' . $donnees['price'] . '</td>';
                        echo'<td>' . $donnees['category'] . '</td>';
                       
                        echo'<td width=300>';
                        echo'<a class="btn btn-default" href="view.php?id='. $donnees['id'] . '"><span class="glyphicon-eye-open"></span>Voir</a>';
                        echo'<a class="btn btn-primary" href="update.php?id='. $donnees['id'] . '"><span class="glyphicon-pencil"></span>Modifier</a>';
                        echo'<a class="btn btn-danger" href="delete.php?id=' . $donnees['id'] . '"><span class="glyphicon-remove"></span>Supprimer</a>';
                            

                        echo'</td>';
                        echo'</tr>';
                    ?>

                    <?php  } $statement -> closeCursor(); ?>
                    
                </tbody>
            </table>

        </div>

    </div>

</body>

</html>