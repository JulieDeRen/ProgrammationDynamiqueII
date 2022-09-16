<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=à, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="ressources/css/style.css">
</head>
<body>
    <nav>
        <ul class="navigation">
            <?php
                // print_r($_SESSION); die();
                if(isset($_SESSION['fingerPrint']) && ($_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']))){

                    // print_r($_SESSION['username']); die();
                    
                    echo "  <li><a href=\"?module=forum&action=index\">Voir les publications</a></li>
                            <li><a href=\"?module=forum&action=create\">Publier un article</a></li>
                            <li><a href=\"?module=user&action=view\">Modifier le profil</a></li>
                            <li><a href=\"?module=user&action=logout\">Logout</a></li>";
                }
                else{
                    echo "<li><a href=\"?module=user&action=login\">Login</a></li>";
                    echo "<li><a href=\"?module=user&action=create\">Nouvel utilisateur</a></li>";
                    echo "<li><a href=\"?module=forum&action=index\">Voir les publications</a></li>";
                }
            ?>
        </ul>
    </nav>
    <div class="container">
        <?php 
         if(isset($_SESSION['fingerPrint']) && ($_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']))){
            // print_r($_SESSION); 
            echo "<h1>Bonjour " . $_SESSION['name'] . " !</h1>";
         }

        echo $content; ?>
    </div>
</body>
</html>