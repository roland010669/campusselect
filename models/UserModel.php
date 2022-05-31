<?php
class User
{
  private $id;
  private $username;
  private $password;
  private $role;

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of username
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * Set the value of username
   *
   * @return  self
   */
  public function setUsername($username)
  {
    $this->username = $username;

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of role
   */
  public function getRole()
  {
    return $this->role;
  }

  /**
   * Set the value of role
   *
   * @return  self
   */
  public function setRole($role)
  {
    $this->role = $role;

    return $this;
  }
  #Validation

  public static function createUser(array $user)
  {
    $u = new User();
    $u->setUsername($user["username"]);
    $u->setPassword($user["password"]);
    $u->setRole($user["role"]);
    return $u;
  }
  public function secureUser()
  {
    //sécuriser les données(XSS)
    $this->setUsername(htmlspecialchars($this->getUsername()));
    $this->setPassword(htmlspecialchars($this->getPassword()));
    $this->setRole(htmlspecialchars($this->getRole()));
  }
}
