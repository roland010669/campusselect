<?php
include __DIR__ . '../../models/UserModel.php';
require_once __DIR__ . '../../dao/UserDAO.php';

class UserController
{
  private $userDAO;

  public function __construct()
  {
    $this->userDAO = new UserDAO();
  }
  /**
   * Get the value of userDAO
   */
  public function getUserDAO()
  {
    return $this->userDAO;
  }

  /**
   * Set the value of userDAO
   *
   * @return  self
   */
  public function setUserDAO($userDAO)
  {
    $this->userDAO = $userDAO;

    return $this;
  }
  public function showAddUser() // GET user/addUser
  {
    include __DIR__ . '/../views/admin/addUser.php';
  }

  public function addUser() //POST admin/addUser
  {
    #récupérer les valeurs saisies
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    //création d'utilisateur
    $user = new User();
    $user->setUsername($username);
    //hacher le mot de passe
    $password = password_hash($password, PASSWORD_DEFAULT);
    $user->setPassword($password);
    $user->setRole($role);
    //insertion d'user dans BDD
    $this->userDAO->save($user);
    //redirection ver la page login.php
    header('location:../views/admin/login.php');
  }
}
