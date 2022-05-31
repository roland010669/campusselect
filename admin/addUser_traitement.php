<?php
$PageTitle = "addUser_traitement";
include __DIR__ . "/../../db/connexion.php";
include __DIR__ . "/../../models/UserModel.php";
include __DIR__ . "/../../dao/UserDAO.php";
isset($_POST) ? $_POST : [];

$usernameFeedback = $_POST['username'];
$passwordFeedback = $_POST['password'];
$roleFeedback = $_POST['role'];
$erreurs = [];

# validation des données 
# username
$usernameFeedback = trim($usernameFeedback);
$usernameFeedback = htmlspecialchars($usernameFeedback);
if (empty($usernameFeedback) == true) {
  $erreurs[0] = "<p>le champ username ne peut être vide!</p>";
}
# Password
//$passwordFeedback = unserialize($passwordFeedback);
$passwordFeedback = trim($passwordFeedback);
$passwordFeedback = htmlspecialchars($passwordFeedback);
if (empty($passwordFeedback)) {
  $erreurs[1] = "<p>le champ password ne peut être vide!</p>";
}

# Role
//$roleFeedback = unserialize($roleFeedback);
$roleFeedback = trim($roleFeedback);
$roleFeedback = htmlspecialchars($roleFeedback);
if (empty($roleFeedback) == true) {
  $erreurs[2] = "<p>le champ role ne peut être vide!</p>";
}
#on vérifie s'il y a des erreurs,si oui on affiche un message d'erreur/s
if (count($erreurs) > 0) {
  foreach ($erreurs as $err) {
    echo "<br> $err";
  }
} else {
  try {


    $connexion = new Connexion();
    $pdoStatement = $connexion->prepare("insert into user values(null,:username,:password,:role);");
    $pdoStatement->bindParam(':username', $usernameFeedback, PDO::PARAM_STR);
    $pdoStatement->bindParam(':password', $passwordFeedback, PDO::PARAM_STR);
    $pdoStatement->bindParam(':role', $roleFeedback, PDO::PARAM_STR);
    $pdoStatement->execute();

    //header("location:addUser.php");
  } catch (PDOException $e) {
    echo "ERREUR : " . $e->getMessage();
    header("location:addUser.php");
  }
}
include_once __DIR__ . "/../../includes/header.php"; ?>
<p style='color:red ' class="text-capitalize text-center fs-2 fw-bold fst-italic" ;>
    <?php echo "ADMINISTRATEUR AJOUTÉ"; ?>
</p>
<div>


    <a class="btn btn-warning" style="background-color:#62529c ;"
        href="http://localhost/CAMPUS_SELECT/views/admin/action_admin.php" role="button" height="30"
        width="200px">Retour
        sur la page
        d'administration</a>
</div>
<?php include_once __DIR__ . "/../../includes/footer.php"; ?>