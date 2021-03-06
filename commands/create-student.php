<?php

use Alura\Doctrine\Entity\Fone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$student = new Student();
$student->setName($argv[1]);

for ($i = 2; $i < $argc; $i++) {
    $foneNumber = $argv[$i];
    $fone = new Fone();
    $fone->setNumber($foneNumber);

    $student->addFone($fone);
}

$entityManager->persist($student);

$entityManager->flush();