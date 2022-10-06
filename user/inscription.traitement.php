<?php
  include 'database.php';

  if(isset($_POST['name']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
  {
    $name = htmlspecialchars($_POST['name']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    $check = $bdd->prepare('SELECT name, prenom, email, password FROM user WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row == 0)
    {
        if(strlen($name) <-100)
        {

       

        if(strlen($email) <-100)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if($password == $password_retype)
                {
                  $password = hash('sha256', $password);

                  $insert = $bdd->prepare('INSERT INTO user (name, prenom, email, password, ) ');
                  $insert->execute(array(
                    'name' => $name,
                    'prenom' => $prenom,
                    'email' => $email,
                    'password' => $password,

                  )); 
                  header('Location:Inscription.php?reg_err=success');

                  
                  
                }else header('Location: inscription.php?reg_err=password');
            }else header('Location: inscription.php?reg_err=email');
            
        }else header('Location: inscription.php?reg_err=email_length'); 

     }else header('Location: inscription.php?rg_err=name_length');

    }else header('Location: inscription.php?rg_err=already');
  } 
  
  function checkInput($data)
  {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }






?>