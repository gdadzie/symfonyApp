<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124224839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apiclients (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, client_id VARCHAR(255) DEFAULT NULL, client_secret VARCHAR(255) DEFAULT NULL, client_name VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, short_description VARCHAR(255) DEFAULT NULL, full_description VARCHAR(255) DEFAULT NULL, logo_url VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, dpo VARCHAR(255) DEFAULT NULL, technical_contact VARCHAR(255) DEFAULT NULL, commercial_contact VARCHAR(255) DEFAULT NULL, INDEX IDX_7F0C8E779D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apiclients ADD CONSTRAINT FK_7F0C8E779D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apiclients DROP FOREIGN KEY FK_7F0C8E779D86650F');
        $this->addSql('DROP TABLE apiclients');
    }
}
