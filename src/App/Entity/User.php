<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="first_name", type="string", length=32)
     * @var string
     */
    private $first_name;

    /**
     * Application constructor.
     * @param $name
     */
    public function __construct($first_name)
    {
        $this->first_name = $first_name;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name
        ];
    }
}