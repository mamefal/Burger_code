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
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet"type="text:css">
    <link rel="stylesheet" href="./style.css">
</head>
<body> 
    <div class="container site">
        <h1 class="text-logo"><a href="index.php"><span class="glyphicon glyphicon-cutlery"></span> Burger Code
        <span class="glyphicon glyphicon-cutlery"></span></a></h1>
            <?php
            include 'admin/database.php';
            echo '<nav>
                    <ul class="nav nav-pills">';
                    $statement = $bdd->query('SELECT * FROM categories');
            
                    $categories = $statement->fetchAll();
                
                    foreach($categories as $category)
                    {
                        if($category['id'] == '1')
                             echo'<li role="presentation" class="active"><a href="'.  '" data-toggle="tab">' .$category['name']. '</a></li>';
                        else
                             echo '<li role="presentation"><a href="'.$category['name'].'.php' .  '" data-toggle="tab">' .$category['name']. '</a></li>';
                    }
                    echo     '</ul>
                        </nav>';

                    echo '<div class="tab-content">';

                    foreach($categories as $category)
                    {
                        if($category['id'] == '1')
                            echo '<div class="tab-pane active" id="' .$category['id'] .'">';
                        else
                            echo '<div class="tab-pane " id="' .$category['id'] .'">';
                        echo '<div class="row">';

                        $statement = $bdd->prepare('SELECT * FROM items WHERE items.category = ?');
                        $statement->execute(array($category['id']));

                        while($item  = $statement->fetch())
                        {
                             echo  '<div class="col-sm-6 col-md-4">
                                         <div class="thumbnail">
                                         <img src="./image/p7/' . $item['image'] . '" alt="...">
                                         <div class="price">' . number_format($item['price'], 2, '.', ''). ' €</div>
                                         <div class="caption">
                                              <h4>' . $item['name'] . '</h4>
                                              <p>' . $item['description'] . '</p>
                                              <a href="#" class="btn btn-order" role="button"><span 
                                                class="glyphicon glyphicon-shopping-cart"></span>Commander</a>
                                        </div>
                                    </div>
                                </div>';
                        }
                        echo '</div>
                             </div>';
                        
                    }
                    echo '</div>';
            ?>

           </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>