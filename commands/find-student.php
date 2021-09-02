<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/**
 * @var Aluno[] $alunoList
 */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "ID: {$student->getId()}\nNome: {$student->getName()}\n\n";
}