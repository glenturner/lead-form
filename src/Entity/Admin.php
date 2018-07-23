<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="admins")
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 */
class Admin implements UserInterface, \Serializable
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=150)
   */
  private $username;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $password;

  /**
   * @ORM\Column(name="is_active", type="boolean")
   */
  private $isActive;

  public function __construct()
  {
    $this->isActive = true;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getUsername():?string
  {
    return $this->username;
  }

  public function setUsername(string $username):self
  {
    $this->username = $username;

    return $this;
  }

  public function getPassword():?string
  {
    return $this->password;
  }

  public function setPassword(string $password):self
  {
    $this->password = $password;

    return $this;
  }

  public function getSalt()
  {
    return null;
  }

  public function eraseCredentials()
  {
  }

  public function getRoles()
  {
    return ['ROLE_ADMIN'];
  }

  public function serialize()
  {
    return serialize([
      $this->id,
      $this->username,
      $this->password,
      // $this->salt,
    ]);
  }

  public function unserialize($serialized)
  {
    list (
      $this->id,
      $this->username,
      $this->password,
      ) = unserialize($serialized, ['allowed_classes' => false]);
  }
}
