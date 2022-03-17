<?php
$review = $db->prepare('SELECT * FROM reviews');
$review->execute();
?>

<!DOCTYPE html>
<html lang="EN">
<head>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="components\css\styles.css"/>
</head>
<body> 
    <div class="title">
        <h1>Sopranos Pizza - Reviews</h1>
    </div>
    <hr class="secondary">
    <div class="container">
        <div class="row">
            <div class="main-text col review-container">
                <table class="table ">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Commentaar</th>
                </tr>
            </thead>
            <tbody>     
                
                <?php while ($row = $review->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                <td colspan="1"><?php echo $row['name']; ?></td>
                <td colspan="2"><?php echo $row['comment']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
            </div>

                <div class="col-sm-2 review-container justify-content-end">
                    <div class="reviews-title">
                        Schrijf een review
                    </div> 
                    <form action="components\review_code.php" method="post" class="form-review">
                            <div class="form-goup">
                                <label for="name">Voor- en Achternaam</label>
                                <input type="text" name="name" id="name" placeholder="Jane Doe">
                            </div>
                            <div class="form-goup">
                                <label for="email">E-mailadres</label>
                                <input type="text" name="email" id="email" placeholder="janedoe@mail.com" required>
                            </div>
                            <div class="form-goup">
                                <label for="comment">Commentaar</label>
                                <textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label" for="anoniem">Anoniem?</label>
                                    <input class="form-check-input-reverse" type="checkbox" id="anoniem" name="anoniem"><br>
                                    <small id="anoniem" class="form-text text-muted">Uw naam wordt weergegeven als Anoniem.</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-review">plaats review</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
    </div>
<script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
<script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</body>
</html>