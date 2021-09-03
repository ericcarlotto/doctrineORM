<?php

declare(strict_types=1);

namespace Alura\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210903182942 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE Course (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE course_student (course_id INTEGER NOT NULL, student_id INTEGER NOT NULL, PRIMARY KEY(course_id, student_id))');
        $this->addSql('CREATE INDEX IDX_BFE0AADF591CC992 ON course_student (course_id)');
        $this->addSql('CREATE INDEX IDX_BFE0AADFCB944F1A ON course_student (student_id)');
        $this->addSql('DROP INDEX IDX_1A16871ECB944F1A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Fone AS SELECT id, student_id, number FROM Fone');
        $this->addSql('DROP TABLE Fone');
        $this->addSql('CREATE TABLE Fone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, student_id INTEGER DEFAULT NULL, number VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_1A16871ECB944F1A FOREIGN KEY (student_id) REFERENCES Student (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO Fone (id, student_id, number) SELECT id, student_id, number FROM __temp__Fone');
        $this->addSql('DROP TABLE __temp__Fone');
        $this->addSql('CREATE INDEX IDX_1A16871ECB944F1A ON Fone (student_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE Course');
        $this->addSql('DROP TABLE course_student');
        $this->addSql('DROP INDEX IDX_1A16871ECB944F1A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Fone AS SELECT id, student_id, number FROM Fone');
        $this->addSql('DROP TABLE Fone');
        $this->addSql('CREATE TABLE Fone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, student_id INTEGER DEFAULT NULL, number VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO Fone (id, student_id, number) SELECT id, student_id, number FROM __temp__Fone');
        $this->addSql('DROP TABLE __temp__Fone');
        $this->addSql('CREATE INDEX IDX_1A16871ECB944F1A ON Fone (student_id)');
    }
}
