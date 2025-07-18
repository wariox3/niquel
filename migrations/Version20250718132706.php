<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250718132706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SEQUENCE acceso_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE acceso (id INT NOT NULL, host VARCHAR(100) DEFAULT NULL, ip VARCHAR(50) DEFAULT NULL, remote_user VARCHAR(100) DEFAULT NULL, auth_user VARCHAR(250) DEFAULT NULL, timestamp VARCHAR(50) DEFAULT NULL, method VARCHAR(30) DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, protocol VARCHAR(50) DEFAULT NULL, status INT DEFAULT NULL, bytes INT DEFAULT NULL, referer VARCHAR(255) DEFAULT NULL, user_agent VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            DROP SEQUENCE acceso_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE acceso
        SQL);
    }
}
