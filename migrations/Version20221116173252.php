<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221116173252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE api_clients (id INT AUTO_INCREMENT NOT NULL, client_id VARCHAR(255) DEFAULT NULL, client_secret VARCHAR(255) DEFAULT NULL, client_name VARCHAR(255) NOT NULL, _active TINYINT(1) NOT NULL, short_description VARCHAR(255) DEFAULT NULL, full_description VARCHAR(255) DEFAULT NULL, logo_url VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, dpo VARCHAR(255) DEFAULT NULL, technical_contact VARCHAR(255) DEFAULT NULL, commercial_contact VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE api_clients_grants (id INT AUTO_INCREMENT NOT NULL, apiclients_id_id INT DEFAULT NULL, client_id VARCHAR(255) DEFAULT NULL, install_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, perms LONGTEXT DEFAULT NULL, branch_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_85DCB18FF8F6D194 (apiclients_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE api_install_perm (id INT AUTO_INCREMENT NOT NULL, apiclientsgrants_id_id INT DEFAULT NULL, branch_id VARCHAR(255) DEFAULT NULL, install_id INT DEFAULT NULL, client_id VARCHAR(255) DEFAULT NULL, members_read INT NOT NULL, members_write TINYINT(1) NOT NULL, members_add TINYINT(1) NOT NULL, members_products_add TINYINT(1) NOT NULL, members_payement_schedules_read INT DEFAULT NULL, members_satistiques_read TINYINT(1) NOT NULL, members_subscription_read TINYINT(1) NOT NULL, payement_schedules_read TINYINT(1) NOT NULL, payement_schedules_write TINYINT(1) NOT NULL, INDEX IDX_E8DCE66EDA92817E (apiclientsgrants_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE api_clients_grants ADD CONSTRAINT FK_85DCB18FF8F6D194 FOREIGN KEY (apiclients_id_id) REFERENCES api_clients (id)');
        $this->addSql('ALTER TABLE api_install_perm ADD CONSTRAINT FK_E8DCE66EDA92817E FOREIGN KEY (apiclientsgrants_id_id) REFERENCES api_clients_grants (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE api_clients_grants DROP FOREIGN KEY FK_85DCB18FF8F6D194');
        $this->addSql('ALTER TABLE api_install_perm DROP FOREIGN KEY FK_E8DCE66EDA92817E');
        $this->addSql('DROP TABLE api_clients');
        $this->addSql('DROP TABLE api_clients_grants');
        $this->addSql('DROP TABLE api_install_perm');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
