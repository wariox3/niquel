<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220160358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE error ADD usuario_objeto JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE error ADD contenedor_objeto JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE error ADD data JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE error ADD peticion JSON DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE error DROP usuario_objeto');
        $this->addSql('ALTER TABLE error DROP contenedor_objeto');
        $this->addSql('ALTER TABLE error DROP data');
        $this->addSql('ALTER TABLE error DROP peticion');
    }
}
