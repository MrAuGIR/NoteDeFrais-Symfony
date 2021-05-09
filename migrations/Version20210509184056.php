<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509184056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expense_report (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, validator_id INT DEFAULT NULL, reference VARCHAR(100) NOT NULL, status INT NOT NULL, description LONGTEXT DEFAULT NULL, supervisor_comment LONGTEXT DEFAULT NULL, started_at DATETIME NOT NULL, ended_at DATETIME DEFAULT NULL, billed INT DEFAULT NULL, total_tva DOUBLE PRECISION DEFAULT NULL, total_ttc DOUBLE PRECISION DEFAULT NULL, total_ht DOUBLE PRECISION DEFAULT NULL, created_at DATETIME NOT NULL, validate_at DATETIME DEFAULT NULL, pdf VARCHAR(255) DEFAULT NULL, INDEX IDX_280A691F675F31B (author_id), INDEX IDX_280A691B0644AEC (validator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transfer (id INT AUTO_INCREMENT NOT NULL, payment_type_id INT DEFAULT NULL, expense_report_id INT NOT NULL, amount DOUBLE PRECISION NOT NULL, code_payment VARCHAR(50) NOT NULL, note LONGTEXT DEFAULT NULL, done_at DATETIME NOT NULL, INDEX IDX_4034A3C0DC058279 (payment_type_id), INDEX IDX_4034A3C08F758FBA (expense_report_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_group_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D6491ED93D47 (user_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_group (id INT AUTO_INCREMENT NOT NULL, administrator_id INT DEFAULT NULL, label VARCHAR(155) NOT NULL, society VARCHAR(155) NOT NULL, logo VARCHAR(255) DEFAULT NULL, phone VARCHAR(10) DEFAULT NULL, UNIQUE INDEX UNIQ_8F02BF9D4B09E92C (administrator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expense_report ADD CONSTRAINT FK_280A691F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE expense_report ADD CONSTRAINT FK_280A691B0644AEC FOREIGN KEY (validator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transfer ADD CONSTRAINT FK_4034A3C0DC058279 FOREIGN KEY (payment_type_id) REFERENCES payment_type (id)');
        $this->addSql('ALTER TABLE transfer ADD CONSTRAINT FK_4034A3C08F758FBA FOREIGN KEY (expense_report_id) REFERENCES expense_report (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491ED93D47 FOREIGN KEY (user_group_id) REFERENCES user_group (id)');
        $this->addSql('ALTER TABLE user_group ADD CONSTRAINT FK_8F02BF9D4B09E92C FOREIGN KEY (administrator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE expense ADD expense_report_id INT NOT NULL');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA68F758FBA FOREIGN KEY (expense_report_id) REFERENCES expense_report (id)');
        $this->addSql('CREATE INDEX IDX_2D3A8DA68F758FBA ON expense (expense_report_id)');
        $this->addSql('ALTER TABLE vehicle ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1B80E486A76ED395 ON vehicle (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA68F758FBA');
        $this->addSql('ALTER TABLE transfer DROP FOREIGN KEY FK_4034A3C08F758FBA');
        $this->addSql('ALTER TABLE transfer DROP FOREIGN KEY FK_4034A3C0DC058279');
        $this->addSql('ALTER TABLE expense_report DROP FOREIGN KEY FK_280A691F675F31B');
        $this->addSql('ALTER TABLE expense_report DROP FOREIGN KEY FK_280A691B0644AEC');
        $this->addSql('ALTER TABLE user_group DROP FOREIGN KEY FK_8F02BF9D4B09E92C');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491ED93D47');
        $this->addSql('DROP TABLE expense_report');
        $this->addSql('DROP TABLE payment_type');
        $this->addSql('DROP TABLE transfer');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_group');
        $this->addSql('DROP INDEX IDX_2D3A8DA68F758FBA ON expense');
        $this->addSql('ALTER TABLE expense DROP expense_report_id');
        $this->addSql('DROP INDEX IDX_1B80E486A76ED395 ON vehicle');
        $this->addSql('ALTER TABLE vehicle DROP user_id');
    }
}
