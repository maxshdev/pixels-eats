<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241113135835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE configuracion CHANGE logo_url logo_url VARCHAR(255) DEFAULT NULL, CHANGE banner_url banner_url VARCHAR(255) DEFAULT NULL, CHANGE facebook_url facebook_url VARCHAR(255) DEFAULT NULL, CHANGE instagram_url instagram_url VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE configuracion CHANGE logo_url logo_url VARCHAR(255) DEFAULT \'NULL\', CHANGE banner_url banner_url VARCHAR(255) DEFAULT \'NULL\', CHANGE facebook_url facebook_url VARCHAR(255) DEFAULT \'NULL\', CHANGE instagram_url instagram_url VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE usuario CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
