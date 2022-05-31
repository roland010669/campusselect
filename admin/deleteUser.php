<?php
session_start();
$PageTitle = "deleteUser";
include __DIR__ . "/../../includes/header.php";
include __DIR__ . "/../../db/connexion.php";
include __DIR__ . "/../../models/UserModel.php";

?>
<!-- Formulaire de Suppression -->
<form action="deleteUser_traitement.php" method="GET">
    <div>
        <label for="suppUser">Veuillez Saisir le Nom de l'admin à Supprimer:</label>
        <input style="background-color: #F4A94E1F;" class="form-control" type="text" id="suppUser" name="username"
            value="">
    </div><br>
    <div>
        <input class="btn btn-danger" id="supp" type="submit" name="supp" value="SUPPRIMER">
    </div>
</form>

<?php


/* Instancier la Class Connexion et afficher le Message d'erreur
 via la méthode getMessage de PDO dont Connexion hérite*/
try {
  $connexion = new Connexion();
} catch (PDOException $ex) {
  echo $ex->getMessage(); //débogage
  exit;
}
function recupUsername()
{
  $usernameFeedback = '';
  isset($_GET['username']) ? $_GET['username'] : "";
  return  $usernameFeedback;
}
$usernameFeedback = recupUsername();

# Instancier la Class User
$userS = new User();
# Préparer la requête sql (analyse,compilation,optimisation)
$pdoStatement = $connexion->prepare("select * from user where username=:username");
$pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
$pdoStatement->bindParam('username', $usernameFeedback, PDO::PARAM_STR);
#exécution de la requête
$pdoStatement->execute();
$userS = $pdoStatement->fetchAll();
include_once __DIR__ . "/../../includes/footer.php";
?>