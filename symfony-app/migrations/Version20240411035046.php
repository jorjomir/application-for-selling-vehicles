<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411035046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_vehicle_type ADD offer_id INT NOT NULL AFTER id');
        $this->addSql('ALTER TABLE car_vehicle_type ADD CONSTRAINT FK_A79ADB9D53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A79ADB9D53C674EE ON car_vehicle_type (offer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_vehicle_type DROP FOREIGN KEY FK_A79ADB9D53C674EE');
        $this->addSql('DROP INDEX UNIQ_A79ADB9D53C674EE ON car_vehicle_type');
        $this->addSql('ALTER TABLE car_vehicle_type DROP offer_id');
    }
}
