<?php

if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=homepage');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type"
    content="text/html"; charset="utf-8">
    <title>Sopranos Pizza - Admin pannel</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="components\css\styles.css"/>

</head>
<body>
 <div class="title">
        <h1>Sopranos Pizza - ACP</h1>
    </div>
    <hr class="secondary">
    <div class="container acp-container">
        <div class="row">
            <div class="col acp-edit-pizza">
                <div class="acp-items-container">
                    Wijzig pizza's
                 </div>
            </div>
            <div class="col acp-add-pizza">
                <div class="acp-items-container">
                        Voeg nieuwe pizza's toe.
                 </div>
            </div>
        </div>
        <div class="row">
            <div class="col acp-edit-acties ">
                <div class="acp-items-container-acties">
                    <h4>Wijzig Acties</h4>
                     <form action="components\edit_acties_code.php" method="post" class="form-review">
                            <div class="form-goup">
                                <label for="name">Actie naam</label>
                                <br>
                                <input type="text" name="name" id="name" placeholder="Jane Doe" required>
                            </div>
                            <div class="form-goup">
                                <label for="description">Beschrijving</label>
                                <textarea name="description" class="form-control" id="description" required></textarea>
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-review">Wijzig acties</button>
                                </div>
                            </div>
                    </form>
                 </div>
            </div>
            <div class="col acp-add-acties">
                <div class="acp-items-container-acties">
                    <h4>Voeg nieuwe acties toe</h4>
                        <form action="components\add_acties_code.php" method="post" class="form-review">
                            <div class="form-goup">
                                <label for="name">Actie naam </label>
                                <br>
                                <input type="text" name="name" id="name" placeholder="Jane Doe" required>
                            </div>
                            <div class="form-goup">
                                <label for="description">Beschrijving</label>
                                <textarea name="description" class="form-control" id="description" required></textarea>
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-review">Voeg acties</button>
                                </div>
                            </div>
                    </form>
                 </div>
                 <div class="col acp-add-acties">
                <div class="acp-items-container-acties">
                    <h4>Verwijder acties</h4>
                        <form action="components\delete_acties_code.php" method="post" class="form-review">
                            <div class="form-goup">
                                <label for="name">Actie naam </label>
                                <br>
                                <input type="text" name="name" id="name" placeholder="Jane Doe" required>
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-review remove">Verwijder acties</button>
                                </div>
                            </div>
                    </form>
                 </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>