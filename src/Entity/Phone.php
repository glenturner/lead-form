<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="phones")
 * @ORM\Entity(repositoryClass="App\Repository\PhoneRepository")
 */
class Phone
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=50)
   */
  private $number;

  public function getId()
  {
    return $this->id;
  }

  public function getNumber():?string
  {
    return $this->number;
  }

  public function setNumber(string $number):self
  {
    $this->number = $number;

    return $this;
  }
}
