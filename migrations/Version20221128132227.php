<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128132227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apiclients ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE apiclients ADD CONSTRAINT FK_7F0C8E779D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7F0C8E779D86650F ON apiclients (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apiclients DROP FOREIGN KEY FK_7F0C8E779D86650F');
        $this->addSql('DROP INDEX IDX_7F0C8E779D86650F ON apiclients');
        $this->addSql('ALTER TABLE apiclients DROP user_id_id');
    }
}
