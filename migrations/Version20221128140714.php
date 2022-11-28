<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128140714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE structures ADD apiclients_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE structures ADD CONSTRAINT FK_5BBEC55AF8F6D194 FOREIGN KEY (apiclients_id_id) REFERENCES apiclients (id)');
        $this->addSql('CREATE INDEX IDX_5BBEC55AF8F6D194 ON structures (apiclients_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE structures DROP FOREIGN KEY FK_5BBEC55AF8F6D194');
        $this->addSql('DROP INDEX IDX_5BBEC55AF8F6D194 ON structures');
        $this->addSql('ALTER TABLE structures DROP apiclients_id_id');
    }
}
