<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231030102219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation CHANGE user_phone user_phone VARCHAR(15) DEFAULT NULL, CHANGE user_firstname user_firstname VARCHAR(100) DEFAULT NULL, CHANGE user_lastname user_lastname VARCHAR(100) DEFAULT NULL, CHANGE user_adress user_adress VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP phone_number, DROP name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD phone_number VARCHAR(15) NOT NULL, ADD name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE user_phone user_phone VARCHAR(15) NOT NULL, CHANGE user_firstname user_firstname VARCHAR(100) NOT NULL, CHANGE user_lastname user_lastname VARCHAR(100) NOT NULL, CHANGE user_adress user_adress VARCHAR(150) NOT NULL');
    }
}
