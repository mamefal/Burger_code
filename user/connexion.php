<?PHP
        include 'database.php';

        $nameError = $prenomError = $emailError = $passwordError = $name = $prenom = $email = $password=  "";
   
   if(!empty($_POST))
   {
        $name             = checkInput($_POST['name']);
        $prenom      = checkInput($_POST['description']);
        $email            = checkInput($_POST['price']);
        $password         = checkInput($_POST['category']);
        $isSuccess        =true;
        $isUploadSuccess  =false;
   }

   if(empty($name))
    {
        $nameError = 'Ce champ ne peut pas etre vide';
        $isSuccess = false;
    }
    if(empty($prenom))
    {
        $prenomError = 'Ce champ ne peut pas etre vide';
        $isSuccess = false;
    }
    if(empty($email))
    {
        $emailError = 'Ce champ ne peut pas etre vide';
        $isSuccess = false;
    }
    if(empty($password))
    {
        $passwordError = 'Ce champ ne peut pas etre vide';
        $isSuccess = false;
    }
    
        if($isSuccess && $isUploadSuccess)
        {
          
          $statement = $db->prepare("INSERT INTO items (name,prenom,email,password,) values (?,?,?,?)");
          $statement->execute(array($name,$prenom,$email,$password));
          
          header("Location: index.php");
        }

    

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    

   


       // $sql ="SELECT * FROM user";

        //$result = $bdd->query($sql);

            //if($result)
        //{
           // while($row= $result->fetch())
           // {
              //  $id=$row['id'];
               // $name=$row['nom'];
                //$prenom=$row['prenom'];
                //$email=$row['email'];
                //$pw=$row['motdepasse'];
                //echo '<tr>
                //<th scope="row">'.$id.'</th>
                //<td>'.$name.'</td>
                //<td>'.$prenom.'</td>
               // <td>'.$email.'</td>
                //<td>'.$pw.'</td>
                //<td>
                //<a class="btn btn-primary" href="update.php?updateid='.$id.'" class="text-light">Modifier</a>
                //<a class="btn btn-danger"href="delete.php?deleteid='.$id.'" class="text-light">Supprimer</a>
                //</td>
               // </tr>';
            //} 
        //}
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
            <h1><strong>Connexion</strong></h1>
            <br>
            <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>"> 
                    <span class="help-inline"><?php echo $nameError; ?></span>
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom :</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" value="<?php echo $prenom; ?>">
                    
                    <span class="help-inline"><?php echo $prenomError; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text"  class="form-control" id="email" name="email" placeholder="email" value="<?php echo $email; ?>">
                    <span class="help-inline"><?php echo $emailError; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <select class="form-control" id="password" name="password">
                        <?php
                           
                           $data = $bdd->query('SELECT * FROM user ');

                           foreach($data as $row  ) 
                           {
                               echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                           }
                            
                        ?>
                    </select>
                </div>
                <br>
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Connexion </button>
                <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left">Retour</a>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>