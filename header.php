

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type"
        content="text/html"; charset="utf-8">
        <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.css">  
        <link rel="stylesheet" href="components\css\styles.css"/>
        <style>
        .navbar {background-color: #FC3A3A; border-bottom: 2px solid #FEB123;}
        .link {color: white; cursor: pointer;}
        .active {color: #feb123}
        .mx-5 {
            padding-left:  50px !important;
            padding-right: 50px !important;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <div class="icon_container">

            </div>
        </div>  

        <nav class="navbar navbar-expand-lg mb-2">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php?page=homepage">
                        <img src="components\img\sopranos_logo.png" alt="logo" class="logo"></img>
                    </a>
                    <a class="navbar-brand link <?php if (
                        $_GET['page'] == 'homepage'
                    ) {
                        echo 'active';
                    } ?>" onclick="location.href='index.php?page=homepage'">Homepage</a>
                    <a class="navbar-brand link <?php if (
                        $_GET['page'] == 'menu'
                    ) {
                        echo 'active';
                    } ?>" onclick="location.href='index.php?page=menu'">Menu</a>
                    <a class="navbar-brand link<?php if (
                        $_GET['page'] == 'contact'
                    ) {
                        echo 'active';
                    } ?>" onclick="location.href='index.php?page=contact'">Contact</a>
                    <a class="navbar-brand link<?php if (
                        $_GET['page'] == 'reviews'
                    ) {
                        echo 'active';
                    } ?>" onclick="location.href='index.php?page=reviews'">Reviews</a>
                    <a class="navbar-brand link<?php if (
                        $_GET['page'] == 'login'
                    ) {
                        echo 'active';
                    } ?>" onclick="location.href='index.php?page=login'">Login</a>
                </form>
                </div>
        </nav>
    </div>
    </body>
</html>

