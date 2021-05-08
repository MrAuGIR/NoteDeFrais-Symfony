<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210508203350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expense (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, expense_report_id INT NOT NULL, created_at DATETIME NOT NULL, done_at DATETIME NOT NULL, quantity INT NOT NULL, description LONGTEXT DEFAULT NULL, cur_iso VARCHAR(255) DEFAULT NULL, total_ht_cur DOUBLE PRECISION DEFAULT NULL, total_ttc_cur DOUBLE PRECISION DEFAULT NULL, total_ht DOUBLE PRECISION DEFAULT NULL, total_ttc DOUBLE PRECISION DEFAULT NULL, total_tva DOUBLE PRECISION DEFAULT NULL, milestone INT DEFAULT NULL, INDEX IDX_2D3A8DA6C54C8C93 (type_id), INDEX IDX_2D3A8DA68F758FBA (expense_report_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expense_report (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(100) NOT NULL, status INT NOT NULL, description LONGTEXT DEFAULT NULL, supervisor_comment LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, validate_at DATETIME DEFAULT NULL, started_at DATETIME NOT NULL, ended_at DATETIME DEFAULT NULL, total_ht DOUBLE PRECISION DEFAULT NULL, total_ttc DOUBLE PRECISION DEFAULT NULL, total_tva DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA6C54C8C93 FOREIGN KEY (type_id) REFERENCES expense_type (id)');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA68F758FBA FOREIGN KEY (expense_report_id) REFERENCES expense_report (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA68F758FBA');
        $this->addSql('DROP TABLE expense');
        $this->addSql('DROP TABLE expense_report');
        $this->addSql('DROP TABLE user');
    }
}
