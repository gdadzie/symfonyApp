<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124225522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apiclientsgrants (id INT AUTO_INCREMENT NOT NULL, apiclients_id_id INT DEFAULT NULL, install_id TINYINT(1) NOT NULL, perms LONGTEXT DEFAULT NULL, branch_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_69276489F8F6D194 (apiclients_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apiclientsgrants ADD CONSTRAINT FK_69276489F8F6D194 FOREIGN KEY (apiclients_id_id) REFERENCES apiclients (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apiclientsgrants DROP FOREIGN KEY FK_69276489F8F6D194');
        $this->addSql('DROP TABLE apiclientsgrants');
    }
}
