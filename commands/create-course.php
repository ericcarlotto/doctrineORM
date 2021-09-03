<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Fone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$course = new Course();
$course->setName($argv[1]);

$entityManager->persist($course);
$entityManager->flush();