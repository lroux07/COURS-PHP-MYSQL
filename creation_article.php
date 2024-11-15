<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <form action="./index.php" method="post">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre"><br>

        <?php
            if (isset($_POST['btn'])) {
                if ($_POST['titre'] !== "") {
                    echo '<p style="color: green;">Titre du blogue : "' . $_POST['titre'] . '"</p>';
                } else {
                    echo '<p style="color: red;">Entrez un titre</p>';
                }
            }
        ?>

        <br>

        <label for="comment">Commentaire:</label><br>
        <textarea name="comment" id="comment" cols="40px" rows="10px"></textarea><br>

        <?php
            if (isset($_POST['btn'])) {
                if ($_POST['comment'] !== "") {
                    echo '<p style="color: green;">Commentaire : "' . $_POST['comment'] . '"</p>';
                } else {
                    echo '<p style="color: red;">Entrez un commentaire</p>';
                }
            }
        ?>

        <br>

        <label for="img">Choisissez une photo avec une taille inférieure à 2 Mo.</label><br>

        <br>

        <input type="file" name="img" id="img"><br>

        <br>

        <input type="submit" name="btn" value="Envoyer">
    </form>

    <br><a href="/AAAAAAAA">page d'affichage du blog</a>


    <!-- -------------------- PHP -------------------- -->

    <?php
        if ($_POST['titre'] !== "" && $_POST['comment'] !== "") {
            $titre = $_POST['titre'];
            $comment = $_POST['comment'];
            $image = $_FILES['img']['name'];
        
            $base = new PDO('mysql:host=127.0.0.1;dbname=base1', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = "INSERT INTO blog (titre, Commentaire, Nom_image) VALUES (:titre, :comment, :img)";
            $resultat = $base->prepare($sql);
            $resultat->execute(['titre' => $titre, 'comment' => $comment, 'img' => $image]);

            echo "<br>Formulaire envoyé !";
        } else {
            echo "<br>Champs vides !";
        }
    ?>
</body>
</html>