<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210515213213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle CHANGE total_distance total_distance INT DEFAULT 0, CHANGE distance_curr_yer distance_curr_yer INT DEFAULT 0, CHANGE distance_last_year distance_last_year INT DEFAULT 0');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle CHANGE total_distance total_distance INT DEFAULT NULL, CHANGE distance_curr_yer distance_curr_yer INT DEFAULT NULL, CHANGE distance_last_year distance_last_year INT DEFAULT NULL');
    }
}
