<?php

use Alura\Doctrine\Entity\Fone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentsRepository = $entityManager->getRepository(Student::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

/** @var student[] $students */
$students = $studentsRepository->findAll();

foreach ($students as $student) {
    $fones = $student
        ->getFones()
        ->map(function (Fone $fone) {
        return $fone->getNumber();
    })
    ->toArray();

    echo "ID: {$student->getId()}\n";
    echo "Name: {$student->getName()}\n";
    echo "Fones: " . implode(", ", $fones) . "\n";

    $courses = $student->getCourses();
    foreach ($courses as $course) {
        echo "\tID Course: {$course->getId()}\n";
        echo "\tCourse: {$course->getName()}\n";
        echo "\n";
    }

    echo "\n";


}

echo "\n";
foreach ($debugStack->queries as $queryInfo) {
    echo $queryInfo['sql'] . "\n";
}