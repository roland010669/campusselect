<?php
include __DIR__ . "/../../includes/header.php";
include __DIR__ . "/../../models/FormationModel.php";
include __DIR__ . "/../../db/connexion.php";

function recupMetier()
{
  isset($_POST['metier']) ? $_POST['metier'] : "";

  return  $_POST['metier'];
}
if (recupMetier() == '') {
  echo "<h1>veuillez Saisir le Nom d'une Formation</h1>";
  exit;
} else {
  //echo recupMetier();
  $rechMetier = new Formation();
  function FrechMetier()
  {

    try {
      $metierFeadBack = recupMetier();
      $connexion = new Connexion();
      $pdoStatement = $connexion->prepare("SELECT * FROM formation WHERE metier=:metier");
      $pdoStatement->bindParam(':metier', $metierFeadBack);
      $pdoStatement->execute();
      $tabMetier = $pdoStatement->fetchAll();
      return $tabMetier;
    } catch (Exception $e) {
      echo "ERREUR : " . $e->getMessage();
    }
  }
}


?>
<div>
  <h3 style="color: red;font-style:italic" class="text-center">Recherche d'une Formation :Résultats pour
    <?php echo recupMetier(); ?></h3>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn btn-light" type="submit" style="font-weight:bold;"><a href="action_admin.php">Retourner sur
        la Page d'administration </a></button>
  </div>

</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Métier</th>
      <th>Filière</th>
      <th>Diplome</th>
      <th>Niveau</th>
      <th>Département</th>
      <th>Etab/dépt</th>
      <th>Parcours</th>
      <th>Fiche Métier</th>
      <th>Fiche Onisep</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $tabMetier = new Formation();
    foreach (FrechMetier($tabMetier) as $r) : ?>
      <tr>
        <td class="table-primary"><?php echo $r["metier"]; ?></td>
        <td class="table-primary"><?php echo $r["filiere"]; ?></td>
        <td class="table-secondary"><?php echo $r["diplome"]; ?></td>
        <td class="table-success"><?php echo $r["niveau"]; ?></td>
        <td class="table-success"><?php echo $r["departement"]; ?></td>
        <td class="table-danger"><?php echo "<a href=" . $r["etab_dep"] . ">Liste</a>"; ?></td>
        <td class="table-warning"><?php echo "<a href=" . $r["parcours"] . ">CONSULTER</a>"; ?></td>
        <td class="table-info"><?php echo "<a href=" . $r["fiche_metier"] . ">CONSULTER</a>"; ?></td>
        <td class="table-light"><?php echo "<a href=" . $r["fiche_onisep"] . ">CONSULTER</a>"; ?></td>
        <td><a class="btn btn-danger" href="http://localhost/CAMPUS_SELECT/login.php" role="button">Supprimer cette
            formation</a></td>
        <td><a class="btn btn-primary" href="http://localhost/CAMPUS_SELECT/login.php" role="button"> Modifier cette
            formation</a></td>

      </tr>

    <?php endforeach; ?>