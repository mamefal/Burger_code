
<?php
$nameError = $prenomError = $emailError = $passwordError = $password_retypeError = $name = $prenom = $email = $password = $password_retype= "";
   
   if(!empty($_POST))
   {
        $name             = checkInput($_POST['name']);
        $prenom      = checkInput($_POST['prenom']);
        $email            = checkInput($_POST['email']);
        $password        = checkInput($_POST['password']);
        $password_retype            = checkInput($_POST['password_retype']);
        
        
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
        $password_retypeError = 'Ce champ ne peut pas etre vide';
        $isSuccess = false;
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
                <h1><strong>Inscription</strong></h1>
                <br>
                  <?php 
                        if(isset($_GET['reg_err']));
                        {
                            $err = htmlspecialchars($_GET["reg_err"]);

                            switch($err)
                            {
                                case'success':
                                    ?>
                                    <div class="alert alert-success">
                                    <strong>Success</strong>inscription réussie !
                                    </div>
                                    <?php
                                break;

                                case'password':
                                    ?>
                                    <div class="alert alert-danger">
                                    <strong>Erreur</strong>mot de passe different 
                                    </div>
                                    <?php
                                break;

                                case'email':
                                    ?>
                                    <div class="alert alert-danger">
                                    <strong>Erreur</strong>mail non valide !
                                    </div>
                                    <?php
                                break;

                                case'email_length':
                                    ?>
                                    <div class="alert alert-danger">
                                    <strong>Erreur</strong>email trop long
                                    </div>
                                    <?php
                                break;

                                case'name':
                                    ?>
                                    <div class="alert alert-danger">
                                    <strong>Erreur</strong>nom trop long
                                    </div>
                                    <?php
                                break;

                                case'already':
                                    ?>
                                    <div class="alert alert-danger">
                                    <strong>Erreur</strong>compte deja existant
                                    </div>
                                    <?php
                                break;
                            }
                        }
                        
                        
                        
                        
                    ?>
                <form class="form" role="form" action="inscription.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                        
                            <label for="name">Nom:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" required="required" autocomplete="off" value="<?php echo $name; ?>"> 
                            
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prenom :</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" required="required" autocomplete="off" value="<?php echo $prenom; ?>">
                            
                            <span class="help-inline"><?php echo $prenomError; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email"  class="form-control" id="email" name="email" placeholder="taper l'email" required="required" autocomplete="off"value="<?php echo $email; ?>">
                            <span class="help-inline"><?php echo $emailError; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Taper le mot de passe" required="required" autocomplete="off" value="<?php echo $password; ?>">
                            <span class="help-inline"><?php echo $passwordError; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password_retype :</label>
                            <input type="password" class="form-control" id="password_retype" name="password_retype" placeholder="Re-taper le mot de passe" required="required" autocomplete="off" value="<?php echo $password_retype; ?>">
                            <span class="help-inline"><?php echo $password_retypeError; ?></span>
                            <?php
                                
                                //$data = $bd->query('SELECT * FROM user');

                                //foreach($data as $row  ) 
                                //{
                                    //echo '<option value="' . $row['email'] . '">' . $row['password'] . '</option>';
                                //}
                                    
                                ?>
                        </div>
                        <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> S'inscrire</button>
                    </div>
                    </fieldset>
                </form>
             </div>
            </div>
         </div>
    </body>
    </html>