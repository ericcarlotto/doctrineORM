<?php

declare(strict_types=1);

namespace Alura\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210903144758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

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

        $this->addSql('DROP INDEX IDX_1A16871ECB944F1A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Fone AS SELECT id, student_id, number FROM Fone');
        $this->addSql('DROP TABLE Fone');
        $this->addSql('CREATE TABLE Fone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, student_id INTEGER DEFAULT NULL, number VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO Fone (id, student_id, number) SELECT id, student_id, number FROM __temp__Fone');
        $this->addSql('DROP TABLE __temp__Fone');
        $this->addSql('CREATE INDEX IDX_1A16871ECB944F1A ON Fone (student_id)');
    }
}
