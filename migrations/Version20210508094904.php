<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210508094904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE group_vehicle_cat (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(155) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kilometric_range (id INT AUTO_INCREMENT NOT NULL, group_vehicle_cat_id INT DEFAULT NULL, range_min INT NOT NULL, range_max INT NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_5FC8CD3FD7FE61E2 (group_vehicle_cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scale (id INT AUTO_INCREMENT NOT NULL, kilometric_range_id INT DEFAULT NULL, vehicle_category_id INT DEFAULT NULL, coef DOUBLE PRECISION NOT NULL, offset INT NOT NULL, INDEX IDX_EC462584A29D8443 (kilometric_range_id), INDEX IDX_EC4625849C7DE094 (vehicle_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_category (id INT AUTO_INCREMENT NOT NULL, group_vehicle_id INT DEFAULT NULL, label VARCHAR(155) NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_DB5E1655839E7663 (group_vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kilometric_range ADD CONSTRAINT FK_5FC8CD3FD7FE61E2 FOREIGN KEY (group_vehicle_cat_id) REFERENCES group_vehicle_cat (id)');
        $this->addSql('ALTER TABLE scale ADD CONSTRAINT FK_EC462584A29D8443 FOREIGN KEY (kilometric_range_id) REFERENCES kilometric_range (id)');
        $this->addSql('ALTER TABLE scale ADD CONSTRAINT FK_EC4625849C7DE094 FOREIGN KEY (vehicle_category_id) REFERENCES vehicle_category (id)');
        $this->addSql('ALTER TABLE vehicle_category ADD CONSTRAINT FK_DB5E1655839E7663 FOREIGN KEY (group_vehicle_id) REFERENCES group_vehicle_cat (id)');
        $this->addSql('ALTER TABLE vehicle ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48612469DE2 FOREIGN KEY (category_id) REFERENCES vehicle_category (id)');
        $this->addSql('CREATE INDEX IDX_1B80E48612469DE2 ON vehicle (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kilometric_range DROP FOREIGN KEY FK_5FC8CD3FD7FE61E2');
        $this->addSql('ALTER TABLE vehicle_category DROP FOREIGN KEY FK_DB5E1655839E7663');
        $this->addSql('ALTER TABLE scale DROP FOREIGN KEY FK_EC462584A29D8443');
        $this->addSql('ALTER TABLE scale DROP FOREIGN KEY FK_EC4625849C7DE094');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48612469DE2');
        $this->addSql('DROP TABLE group_vehicle_cat');
        $this->addSql('DROP TABLE kilometric_range');
        $this->addSql('DROP TABLE scale');
        $this->addSql('DROP TABLE vehicle_category');
        $this->addSql('DROP INDEX IDX_1B80E48612469DE2 ON vehicle');
        $this->addSql('ALTER TABLE vehicle DROP category_id');
    }
}
