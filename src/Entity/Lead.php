<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Table(name="leads")
 * @ORM\Entity(repositoryClass="App\Repository\LeadRepository")
 */
class Lead
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
  private $name;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $email;

  /**
   * @ORM\Column(type="string", length=15)
   */
  private $postal_code;

  /**
   * Lead one to one relationship to Phone.
   * @OneToOne(targetEntity="Phone", mappedBy="id", cascade={"remove"})
   * @JoinColumn(name="phone_id", referencedColumnName="id")
   */
  private $phone;

  public function getId()
  {
    return $this->id;
  }

  public function getName():?string
  {
    return $this->name;
  }

  public function setName(string $name):self
  {
    $this->name = $name;

    return $this;
  }

  public function getEmail():?string
  {
    return $this->email;
  }

  public function setEmail(string $email):self
  {
    $this->email = $email;

    return $this;
  }

  public function getPostalCode():?string
  {
    return $this->postal_code;
  }

  public function setPostalCode(string $postal_code):self
  {
    $this->postal_code = $postal_code;

    return $this;
  }

  public function getPhone(): ?Phone
  {
    return $this->phone;
  }

  public function setPhone(?Phone $phone):self
  {
    $this->phone = $phone;

    return $this;
  }
}
