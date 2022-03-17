<?php
$actions = $db->prepare('SELECT * FROM `acties`');
$actions->execute();

$review = $db->prepare('SELECT * FROM `reviews`');
$review->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type"
    content="text/html"; charset="utf-8">
    <title>Sopranos Pizza</title>
    <link rel="stylesheet" href="components\css\styles.css"/>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.css"/>

</head>
<body>
    <div class="title">
        <h1>Sopranos Pizza</h1>
    </div>
    <hr class="secondary">
    <main>
        <div class="container-fluid main">
            <div class="main">
                <div class="row">
                    <div class="main-text col">
                        
                    </div>
                    <div class="col-sm-2 home-reviews">
                        <div class="reviews-title">
                            Reviews
                        </div> 
                        <hr class="secondary">
                        <div class="reviews-text">
                            <?php while (
                                $row = $review->fetch(PDO::FETCH_ASSOC)
                            ):
                                echo '<h5>' . $row['name'] . '</h5>';
                                echo '<p class="main-text">' .
                                    $row['comment'] .
                                    '</p>';
                                echo '<hr class="secondary">';
                            endwhile; ?>
                        </div>
                    </div>
                    <div class="col-sm-2 home-acties">
                        <div class="acties-title">
                            Acties
                        </div> 
                        <hr class="secondary">
                        <div class="acties-text">
                             <?php while (
                                 $row = $actions->fetch(PDO::FETCH_ASSOC)
                             ):
                                 echo '<h5>' . $row['name'] . '</h5>';
                                 echo '<p class="main-text"> ' .
                                     $row['description'] .
                                     '</p>';
                                 echo '<hr class="secondary">';
                             endwhile; ?>
                            <a href="index.php?page=menu">
                                <input type="button" value="Bestel online" class="btn-acties"/>
                            </a>
                        </div>
                    </div>
                    <div class="container-fluid small-menu-container">
                        <div class="row">
                            <div class="menu-title">Meest bestelde pizza's</div>
                                <div class="col text-items small-menu-items">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, consequuntur?
                                </div>
                                <div class="col text-items small-menu-items">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, ea!
                                </div>
                                <div class="col text-items small-menu-items">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta, natus.
                                </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </main>
<script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
<script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</body>
</html> 