<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125075523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apiinstallperm (id INT AUTO_INCREMENT NOT NULL, apiclientgrants_id_id INT DEFAULT NULL, branch_id VARCHAR(255) DEFAULT NULL, install_id TINYINT(1) NOT NULL, client_id VARCHAR(255) DEFAULT NULL, members_read TINYINT(1) NOT NULL, members_write TINYINT(1) NOT NULL, members_add TINYINT(1) NOT NULL, members_products_add TINYINT(1) NOT NULL, members_payment_schedules_read TINYINT(1) NOT NULL, members_subcription_read TINYINT(1) NOT NULL, payment_schedules_write TINYINT(1) NOT NULL, payment_schedules_read TINYINT(1) NOT NULL, payment_day_read TINYINT(1) NOT NULL, INDEX IDX_CFF97C7B65E6317B (apiclientgrants_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apiinstallperm ADD CONSTRAINT FK_CFF97C7B65E6317B FOREIGN KEY (apiclientgrants_id_id) REFERENCES apiclientsgrants (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apiinstallperm DROP FOREIGN KEY FK_CFF97C7B65E6317B');
        $this->addSql('DROP TABLE apiinstallperm');
    }
}
