<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230612154256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE unavailable_date (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, all_courses TINYINT(1) NOT NULL, date DATE NOT NULL, all_day TINYINT(1) NOT NULL, slot TIME DEFAULT NULL, INDEX IDX_42DFE3CB591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE unavailable_date ADD CONSTRAINT FK_42DFE3CB591CC992 FOREIGN KEY (course_id) REFERENCES cours (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unavailable_date DROP FOREIGN KEY FK_42DFE3CB591CC992');
        $this->addSql('DROP TABLE unavailable_date');
    }
}
