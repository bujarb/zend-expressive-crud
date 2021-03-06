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
     * @ORM\Column(name="last_name", type="string", length=32)
     * @var string
     */
    private $last_name;

    /**
     * @ORM\Column(name="email", type="string", length=32)
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(name="password", type="string", length=32)
     * @var string
     */
    private $password;

    public function parseData($data){

        try{

            foreach ($data as $key => $d){

                $this->{$key} = $d;

            }

        }catch (\Exception $e){
            echo $e->getMessage();die;
        }

    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email
        ];
    }
}