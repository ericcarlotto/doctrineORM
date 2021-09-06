<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
    /**
     * @OneToMany(targetEntity="Fone", mappedBy="student", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private $fones;

    /**
     * @ManyToMany(targetEntity="Course", mappedBy="students")
     */
    private $courses;

    public function __construct()
    {
        $this->fones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function addFone(Fone $fone)
    {
        $this->fones->add($fone);
        $fone->setStudent($this);
        return $this;
    }

    public function getFones(): Collection
    {
        return $this->fones;
    }

    public function addCourses(Course $course): self
    {
        if ($this->courses->contains($course)) {
            return $this;
        }
        $this->courses->add($course);
        $course->addStudent($this);
        return $this;
    }

    /** @return Course[] */
    public function getCourses(): Collection
    {
        return $this->courses;
    }
}