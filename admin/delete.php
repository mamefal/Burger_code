<?php
   include 'database.php';

   if(!empty($_POST))
   {
    $id = checkInput($_POST['id']);

    $statement = $bdd->prepare("DELETE * FROM items WHERE id = ?");
    $statement->execute(array($id));

    header("Location: index.php");
   }


    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
            <h1><strong>Supprimer un item </strong></h1>
            <br>
            <form class="form" role="form" action="delete.php" method="post">
                <p class="alert-warning">Etes vous sur de vouloir supprimer ?</p>
                <input type="hidden" name="id" value="<?php echo $id;?>" />
                <div class="form-actions">
                <button type="submit" class="btn btn-warning">Oui</button>
                <a class="btn btn-default" href="index.php">Non</a>
            </div>
            </form>

        </div>

       </div>
    </div>

</body>

</html>




                
                       












                    