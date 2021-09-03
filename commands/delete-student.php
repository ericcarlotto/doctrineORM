<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\ORM\ORMException;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];

try {
    $student = $entityManager->getReference(Student::class, $id);
} catch (ORMException $e) {
    return e.get_call_stack();
}

$entityManager->remove($student);
$entityManager->flush();