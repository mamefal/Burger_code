<?php
   include 'database.php';
   

   if(!empty($_GET['id']))
   {
    $id = checkInput($_GET['id']);
   }

   $nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";
   
   if(!empty($_POST))
   {
        $name             = checkInput($_POST['name']);
        $description      = checkInput($_POST['description']);
        $price            = checkInput($_POST['price']);
        $category         = checkInput($_POST['category']);
        $image            = checkInput($_FILES['image']['name']);
        $imagePath        = '../image/p7/' . basename($image);
        $imageExtension   = pathinfo($imagePath, 'PATHINFO_EXTENSION');
        $isSuccess        =true;

        if(empty($name))
            {
                $nameError = 'Ce champ ne peut pas etre vide';
                $isSuccess = false;
            }
        if(empty($description))
            {
                $descriptionError = 'Ce champ ne peut pas etre vide';
                $isSuccess = false;
            }
        if(empty($price))
            {
                $priceError = 'Ce champ ne peut pas etre vide';
                $isSuccess = false;
            }
        if(empty($category))
            {
                $categoryError = 'Ce champ ne peut pas etre vide';
                $isSuccess = false;
            }
        if(empty($image))
            {
                $imageUpdated = false;
            }
        }
    else
    {
        $isImageUpdated = true;
        $isUploadSuccess = true;
        if($imageExtension = "jpg" && $imageExtension = "jpeg" && $imageExtension = "gif" )
         {
            $imageError = "Les fichiers autorises sont : .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
         }
        if(file_exists($imagepath))
         {
            $imageError = "le fichier existe deja";
            $isUploadSuccess = false;
         }
        if($_FILES["image"]["size"]> 500000)
         {
            $imageError = "le fichier ne doit pas depasser les 500KB";
            $isUploadSuccess = false;
         }
        if($isUploadSuccess)
         {
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath))
            {
                $imageError = "il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
         }
    
         if(($isSuccess && $isImageUpdated && $isUploadSuccess )|| ($isSuccess && !$isImageUpdated)) 
         {
          
           
          if($isImageUpdated)
          {
                $statement = $bdd->prepare("UPDATE items set name = ?, description = ?, price = ?,category = ?, image = ?, WHERE id= ?");
                $statement->execute(array($name,$description,$price,$category,$image,$id));
          }
          else
          {
            $statement = $bdd->prepare("UPDATE items set name = ?, description = ?, price = ?,category = ?, image = ?, WHERE id= ?");
            $statement->execute(array($name,$description,$price,$category,$id));
          }

           
           header("Location: index.php");
         }
         else if($isImageUpdated && !$isUploadSuccess)
         {
            
            $statement= $bdd->prepare("SELECT image FROM items WHERE id = ?");
            $statement->execute(array($id));
            $item  = $statement->fetch();
            $image = $item['image'];
         }
            
         

         else
         {
            
            $statement= $db->prepare("SELECT * FROM items WHERE id = ?");
            $statement->execute(array($id));
            $item = $statement->fetch();
            $name           =$item['name'];
            $description    =$item['description'];
            $price          =$item['price'];
            $category       =$item['category'];
            $image          =$item['image'];
             
         }  
            
         
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
     <div class="container site">
        <h1 class="text_logo"><span class="glyphicon glyphicon-cutlery"></span>
            Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
        <div class="container admin">
            <div class="row">
                <div class="col-sm-6">
                <h1><strong>Modifier un item </strong></h1>
                <br>
                <form class="form" role="form" action="<?php echo 'update.php?id=' . $id; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nom :</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>"> 
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
                        
                        <span class="help-inline"><?php echo $descriptionError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix : (en ???)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price; ?>">
                        <span class="help-inline"><?php echo $priceError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="category">Cat??gorie :</label>
                        <select class="form-control" id="category" name="category">
                            <?php
                              
                            
                            foreach($bdd->query('SELECT * FROM categories ')  as $row )

                            {   
                                if($row['id'] == $category)
                                   echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                else
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                 

                            }
                              
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image:</label>
                        <p><?php echo $image; ?></p>
                        <label for="image">S??lectionner une image  :</label>
                        <input type="file" id="image" name="image">
                        <span class="help-inline"><?php echo $imageError; ?></span>
                    </div>
                    <br>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier </button>
                    <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left">Retour</a>
                </div>
                </form>
            </div>
            <div class="col-sm-6 site">
             <div class="thumbnail">
                                <img src="<?php echo './image/p7/m4.pnj' . $image ; ?> " alt="..">
                                <div class="price"><?php echo number_format((float)$price,2, '.', '') . '???'; ?></div>
                                <div class="caption">
                                    <h4><?php echo $name; ?></h4>
                                    <p><?php echo $description; ?></p>
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
