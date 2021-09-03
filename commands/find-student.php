<?php

use Alura\Doctrine\Entity\Fone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/**
 * @var Student[] $alunoList
 */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    $fones = $student
        ->getFones()
        ->map(function (Fone $fone) {
            return $fone->getNumber();
        })
        ->toArray();
    echo "ID: {$student->getId()}\nNome: {$student->getName()}\n\n";
    echo "Fone Numbers: " . implode(', ', $fones) . "\n\n";
}