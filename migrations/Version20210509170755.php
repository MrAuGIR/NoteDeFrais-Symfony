<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509170755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, tax_horse_power_id INT NOT NULL, type_vehicle_id INT NOT NULL, INDEX IDX_64C19C14A02F324 (tax_horse_power_id), INDEX IDX_64C19C14950C1F4 (type_vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kilometric_range (id INT AUTO_INCREMENT NOT NULL, min INT NOT NULL, max INT NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scale (id INT AUTO_INCREMENT NOT NULL, kilometric_range_id INT NOT NULL, category_id INT DEFAULT NULL, coef DOUBLE PRECISION NOT NULL, offset INT NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_EC462584A29D8443 (kilometric_range_id), INDEX IDX_EC46258412469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tax_horse_power (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(6) NOT NULL, label VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_vehicle (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(6) NOT NULL, label VARCHAR(155) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, imma VARCHAR(10) NOT NULL, model VARCHAR(155) DEFAULT NULL, total_distance INT DEFAULT NULL, distance_curr_yer INT DEFAULT NULL, distance_last_year INT DEFAULT NULL, INDEX IDX_1B80E48612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C14A02F324 FOREIGN KEY (tax_horse_power_id) REFERENCES tax_horse_power (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C14950C1F4 FOREIGN KEY (type_vehicle_id) REFERENCES type_vehicle (id)');
        $this->addSql('ALTER TABLE scale ADD CONSTRAINT FK_EC462584A29D8443 FOREIGN KEY (kilometric_range_id) REFERENCES kilometric_range (id)');
        $this->addSql('ALTER TABLE scale ADD CONSTRAINT FK_EC46258412469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scale DROP FOREIGN KEY FK_EC46258412469DE2');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48612469DE2');
        $this->addSql('ALTER TABLE scale DROP FOREIGN KEY FK_EC462584A29D8443');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C14A02F324');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C14950C1F4');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE kilometric_range');
        $this->addSql('DROP TABLE scale');
        $this->addSql('DROP TABLE tax_horse_power');
        $this->addSql('DROP TABLE type_vehicle');
        $this->addSql('DROP TABLE vehicle');
    }
}
