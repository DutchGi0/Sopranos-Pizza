<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type"
        content="text/html"; charset="utf-8">
        <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.css">  
        <style>
        .active {background-color: red;}
        </style>
    </head>
    <body>
        <div class="header">
            <div class="icon_container">

            </div>
        </div>  

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                <a class="navbar-brand" href="#">PizzaSopranos</a>
                    <a class="navbar-brand <?php if (
                        $_GET['page'] == 'homepage'
                    ); ?>" onclick="location.href='index.php?page=homepage'">Homepage</a>
                    <a class="navbar-brand <?php if ($_GET['page'] == 'menu') {
                        echo 'active';
                    } ?>" onclick="location.href='index.php?page=menu'">Menu</a>
                    <a class="navbar-brand <?php if (
                        $_GET['page'] == 'contact'
                    ) {
                        echo 'active';
                    } ?>" onclick="location.href='index.php?page=contact'">Contact</a>
                    <a class="navbar-brand <?php if (
                        $_GET['page'] == 'reviews'
                    ) {
                        echo 'active';
                    } ?>" onclick="location.href='index.php?page=reviews'">Reviews</a>
                </form>
                </div>
        </nav>
    </div>
    </body>
</html>

