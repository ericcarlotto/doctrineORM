<?php

namespace Alura\Doctrine\Entity;


/**
 * @Entity
 */
class Fone
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $number;
    /**
     * @ManyToOne(targetEntity="Student")
     */
    private $student;

    public function getStudent(): Student
    {
        return $this->student;
    }


    public function setStudent(Student $student): self
    {
        $this->student = $student;
        return $this;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

}