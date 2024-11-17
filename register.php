<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="login">Username : </label>
        <input type="text" id="login" name="login"><br>
        <label for="password">mot de passe : </label>
        <input type="password" id="password" name="password"><br>
        <input type="submit" name="submit" value="valider">
    </form>

    <?php
        if (isset($_POST['submit'])) {
            $base = new PDO('mysql:host=127.0.0.1;dbname=base1', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO login_password (Login, Mot_de_passe) VALUES (:login, :password)";

            $resultat = $base->prepare($sql);
            $resultat->execute(['login' => $_POST["login"], 'password' => $_POST["password"]]);

            echo 'Compte créé';
            header('location: ./creation_article.php');
        } else {
            echo 'Inscription échoué';
        }
    ?>
</body>
</html>