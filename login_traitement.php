<!DOCTYPE html>
<html lang="fr">
<?php $PageTitle = "logout"; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $PageTitle; ?></title>
</head>

<body>
    <?php
    session_start();
    require_once 'dao/UserDAO.php';
    # vérification et récupération des données saisies
    isset($_POST) ? $_POST : [];
    isset($_POST["username"]) ? $_POST["username"] : "";
    if (isset($_POST["username"])) {
        $username = $_POST["username"];
    } else {
        $username = "";
    }
    isset($_POST["password"]) ? $_POST["password"] : "";
    if (isset($_POST["password"])) {
        $pass = $_POST["password"];
    } else {
        $pass = "";
    }
    isset($_POST["role"]) ? $_POST["role"] : "";
    if (isset($_POST["role"])) {
        $role = $_POST["role"];
    } else {
        $role = "";
    }
    # instanciation de la class UserDAO
    $userDao = new UserDAO();
    #récupérer de la BDD les données user/s
    $user = $userDao->findByUsername($username);
    # vérifier que les données saisies corresponden à celle récupérer de la BDD
    if ($user->getUsername() === $username && $user->getPassword() === $pass && $user->getRole() === $role) {
        $_SESSION["connected"] = true;
        # redirection vers la page d'administration
        header('location:views/admin/action_admin.php');
        die();
    } else {
        $_SESSION["connected"] = false;
        # si les données ne matchent pas ,redirection vers la page login
        header('location:login.php');
        die();
    }
    ?>
</body>

</html>