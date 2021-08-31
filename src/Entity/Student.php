<?php

namespace Alura\Doctrine\Entity;

/**
 * @Entity
 */

class Student
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private $id;
    /**
     * @Column (type="string")
     */
    private $name;


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): string
    {
        return $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }


}