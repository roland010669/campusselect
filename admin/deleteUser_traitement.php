<?php
session_start();
$PageTitle = "deleteUser_traitement";
require __DIR__ . "/../../db/connexion.php";
$connected = isset($_SESSION["connected"]) ? true : false;
if (!$connected) {
  header("location:http://localhost/CAMPUS_SELECT/login.php");
} else {
  try {
    $connexion = new Connexion();
  } catch (PDOException $ex) {
    echo "échec de la connection";
    exit;
  }

  try {
    $usernameFeedback = $_GET['username'];

    $sql = "delete from user where username=:username";
    $pdoStat = $connexion->prepare($sql);
    $pdoStat->bindParam(':username',  $usernameFeedback);
    $pdoStat->execute();
  } catch (PDOException $ex) {
    echo "ERREUR!";
  }
}
include_once __DIR__ . "/../../includes/header.php"; ?>
<p style='color:red ' class="text-capitalize text-center fs-2 fw-bold fst-italic" ;>
    <?php echo "ADMINISTRATEUR supprimé"; ?>
</p>
<div>


    <a class="btn btn-warning" style="background-color:#62529c ;"
        href="http://localhost/CAMPUS_SELECT/views/admin/action_admin.php" role="button" height="30"
        width="200px">Retour
        sur la page
        d'administration</a>
</div>
<?php include_once __DIR__ . "/../../includes/footer.php"; ?>