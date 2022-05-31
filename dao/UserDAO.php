<?php
include_once __DIR__ . "/../db/connexion.php";
class UserDAO
{
  private $connexion;

  public function __construct()
  {
    $this->connexion = new Connexion();
  }

  /**
   * Get the value of connexion
   */
  public function getConnexion()
  {
    return $this->connexion;
  }

  /**
   * Set the value of connexion
   *
   * @return  self
   */
  public function setConnexion($connexion)
  {
    $this->connexion = $connexion;

    return $this;
  }

  public function save(User $user)
  {
    $statment = $this->connexion->prepare("insert into user values(null, :username, :pass, :role)");
    $statment->execute([
      ":username" => $user->getUsername(),
      ":pass" => $user->getPassword(),
      ":role" => $user->getRole(),
    ]);
  }

  public function findByUsername(string $username)
  {
    require_once __DIR__ . "/../models/UserModel.php";
    $statment = $this->connexion->prepare("select * from user where username=:username");
    $statment->execute([
      ":username" => $username
    ]);
    $user = $statment->fetch();
    if ($user) {
      $user = User::createUser($user);
    } else {
      $user = new User();
    }
    return $user;
  }
}

function recupUsername()
{
  $usernameFeedback = '';
  isset($_GET['username']) ? $_GET['username'] : "";
  return  $usernameFeedback;
}
function recupPassword()
{
  $passwordFeedback = '';
  isset($_GET["password"]) ? $_GET["password"] : "";
  return  $passwordFeedback;
}
function recupRole()
{
  $roleFeedback = '';
  isset($_GET["role"]) ? $_GET["role"] : "";
  return  $roleFeedback;
}
function recupUsernameP()
{
  $_POST["username"] = '';
  $usernameFeedback = $_POST["username"];
  isset($_POST["username"]) ? $_POST["username"] : "";
  return  $usernameFeedback;
}
function recupPasswordP()
{
  $_POST["password"] = '';
  $passwordFeedback = $_POST["password"];
  isset($_POST["password"]) ? $_POST["password"] : "";
  return  $passwordFeedback;
}
function recupRoleP()
{
  $_POST["role"] = '';
  $roleFeedback = $_POST["role"];
  isset($_POST["role"]) ? $_POST["role"] : "";
  return  $roleFeedback;
}