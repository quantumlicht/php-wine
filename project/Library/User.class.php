<?php
namespace Library;

session_start();

class User extends ApplicationComponent
{
  public function getAttribute($attr)
  {
    return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
  }

  public function getFlash()
  {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);

    return $flash;
  }

  public function getErrorFlash()
  {
    $error_flash = $_SESSION['error_flash'];
    unset($_SESSION['error_flash']);

    return $error_flash;
  }

  public function hasFlash()
  {
    return isset($_SESSION['flash']);
  }

  public function hasErrorFlash()
  {
    return isset($_SESSION['error_flash']);
  }

  public function isAdmin()
  {
    return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
  }

  public function isAuthenticated(){
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }

  public function setAttribute($attr, $value)
  {
    $_SESSION[$attr] = $value;
  }

  public function setAuthenticated($authenticated = true)
  {
    if (!is_bool($authenticated))
    {
      throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
    }

    $_SESSION['auth'] = $authenticated;
  }

  public function setAdmin($admin = true){

    if (!is_bool($admin))
    {
      throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAdmin() doit être un boolean');
    }

    $_SESSION['admin'] = $admin;
  }

  public function setFlash($value)
  {
    $_SESSION['flash'] = $value;
  }

  public function setErrorFlash($value)
  {
    $_SESSION['error_flash'] = $value;
  }
}
