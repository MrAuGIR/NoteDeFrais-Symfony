<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509173455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expense (id INT AUTO_INCREMENT NOT NULL, expense_type_id INT DEFAULT NULL, tva_id INT DEFAULT NULL, created_at DATETIME NOT NULL, done_at DATETIME NOT NULL, quantity INT NOT NULL, description LONGTEXT DEFAULT NULL, cur_iso VARCHAR(10) NOT NULL, total_ht_cur DOUBLE PRECISION DEFAULT NULL, total_ttc_cur DOUBLE PRECISION DEFAULT NULL, total_ht DOUBLE PRECISION DEFAULT NULL, total_ttc DOUBLE PRECISION DEFAULT NULL, total_tva DOUBLE PRECISION DEFAULT NULL, INDEX IDX_2D3A8DA6A857C7A9 (expense_type_id), INDEX IDX_2D3A8DA64D79775F (tva_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expense_type (id INT AUTO_INCREMENT NOT NULL, tva_id INT DEFAULT NULL, code VARCHAR(6) NOT NULL, label VARCHAR(155) NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_3879194B4D79775F (tva_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE files (id INT AUTO_INCREMENT NOT NULL, expense_id INT NOT NULL, file_name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, directory VARCHAR(50) DEFAULT NULL, extension VARCHAR(6) DEFAULT NULL, owner VARCHAR(100) DEFAULT NULL, INDEX IDX_6354059F395DB7B (expense_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tva (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, taux DOUBLE PRECISION NOT NULL, note VARCHAR(155) DEFAULT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA6A857C7A9 FOREIGN KEY (expense_type_id) REFERENCES expense_type (id)');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA64D79775F FOREIGN KEY (tva_id) REFERENCES tva (id)');
        $this->addSql('ALTER TABLE expense_type ADD CONSTRAINT FK_3879194B4D79775F FOREIGN KEY (tva_id) REFERENCES tva (id)');
        $this->addSql('ALTER TABLE files ADD CONSTRAINT FK_6354059F395DB7B FOREIGN KEY (expense_id) REFERENCES expense (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE files DROP FOREIGN KEY FK_6354059F395DB7B');
        $this->addSql('ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA6A857C7A9');
        $this->addSql('ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA64D79775F');
        $this->addSql('ALTER TABLE expense_type DROP FOREIGN KEY FK_3879194B4D79775F');
        $this->addSql('DROP TABLE expense');
        $this->addSql('DROP TABLE expense_type');
        $this->addSql('DROP TABLE files');
        $this->addSql('DROP TABLE tva');
    }
}
