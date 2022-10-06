


<?php
   include 'database.php';

   if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $bdd->query('SELECT  * FROM items WHERE id='.$id );
    $donnees = $sql->fetch();
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Code</title>
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
            <div class="col-sm-6">
            <h1><strong>Voir un item </strong></h1>
            <br>
            <form>
                <div class="form-group">
                    <label>Nom :</label><?php echo '' . $donnees['name']; ?>
                </div>
                <div class="form-group">
                    <label>Description :</label><?php echo '' . $donnees['description']; ?>
                </div>
                <div class="form-group">
                    <label>Prix :</label><?php echo '' . $donnees['price']; ?>
                </div>
                <div class="form-group">
                    <label>Catégorie :</label><?php echo '' . $donnees['category']; ?>
                </div>
                <div class="form-group">
                    <label>Image :</label><?php echo '' . $donnees['image']; ?>
                </div>
            </form>
            <div class="form-actions">
                <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left">Retour</a>

            </div>

             </div>
             <div class="col-sm-6 site">
             <div class="thumbnail">
                                <img src="<?php echo '../images/' . $donnees['image'] ; ?> " alt="..">
                                <div class="price"><?php echo '' . $donnees['price']; ?></div>
                                <div class="caption">
                                    <h4><?php echo '' . $donnees['name']; ?></h4>
                                    <p><?php echo '' . $donnees['description']; ?></p>
                                    <a href="#" class="btn btn-order" role="button"><span 
                                    class="glyphicon glyphicon-shopping-cart"></span>Commander</a>
                                </div>
                            </div>
                        </div>

             </div>
        </div>

    </div>

</body>

</html>



