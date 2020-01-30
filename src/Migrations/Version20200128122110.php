<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200128122110 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE producto ADD categoria VARCHAR(255) DEFAULT NULL, ADD tipo LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE precio precio DOUBLE PRECISION DEFAULT NULL, CHANGE imagen imagen VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trabajadores CHANGE fecha_nacimiento fecha_nacimiento VARCHAR(255) DEFAULT NULL, CHANGE foto foto VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE producto DROP categoria, DROP tipo, CHANGE precio precio DOUBLE PRECISION DEFAULT \'NULL\', CHANGE imagen imagen VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE trabajadores CHANGE fecha_nacimiento fecha_nacimiento VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE foto foto VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
