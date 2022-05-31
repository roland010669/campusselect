<?php

include_once __DIR__ . '/../dao/FormationDAO.php';
/*création de la classe FormationController avec un "private attribute" et une  "method"  qui instancie
 la classe FormationDAO (qui elle permet la connexion à la BDD "en instanciant Connexion")  */
class FormationController
{
  private $FormationDAO;

  public function __construct()
  {
    $this->formationDAO = new FormationDAO();
  }
  /**
   * Get the value of FormationDAO
   */
  public function getFormationDAO()
  {
    return $this->FormationDAO;
  }

  /**
   * Set the value of FormationDAO
   *
   * @return  self
   */
  public function setFormationDAO($FormationDAO)
  {
    $this->FormationDAO = $FormationDAO;

    return $this;
  }
  /**
   * GET admin/addFormation
   * fonction pour afficher le formulaire d'ajout d'une formation
   */
  public function showAddFormation()
  {

    include __DIR__ . "/../views/admin/addFormation.php";
  }
  /**
   * POST admin/addFormation
   * traitement du formulaire d'ajout d'une formation
   */
  public function addFormation()
  {
    include __DIR__ . "/../views/admin/addFormation_traitement.php";
  }
  /**
   * GET admin/updateFormation/{metier}
   */
  public function showUpdateFormation()
  {
    //récupérer la Formation

    include __DIR__ . "/../views/admin/updateFormation.php";
  }
  /**
   * POST admin/updateFormation
   */
  public function updateFormation()
  {
    include __DIR__ . "/../views/admin/updateFormation_traitement.php";
  }
  /**
   * POST admin/deleteFormation
   */
  public function showDeleteFormation()
  {
    include __DIR__ . "/../views/admin/deleteFormation.php";
  }
  public function deleteFormation()
  {
    include __DIR__ . "/../views/admin/deleteFormation.php";
  }
  /**
   * GET admin/readFormation/{metier}
   */
  public function showReadFormation()
  {
    include __DIR__ . "/../views/admin/readFormation.php";
  }
  public function readFormation()
  {

    include __DIR__ . "/../views/admin/readFormation_traitement.php";
  }
  public function action_admin_page()
  {
    include __DIR__ . "/../views/admin/action_admin.php";
  }
}