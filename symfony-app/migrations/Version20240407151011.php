<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240407151011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("CREATE TABLE car_vehicle_type (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, engine_capacity INT NOT NULL, colour VARCHAR(255) NOT NULL, number_of_doors ENUM('3', '5') NOT NULL, car_category VARCHAR(255) NOT NULL, price NUMERIC(10, 2) NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB");
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E9D86650F');
        $this->addSql('DROP INDEX IDX_29D6873E9D86650F ON offer');
        $this->addSql('ALTER TABLE offer CHANGE user_id user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_29D6873E9D86650F ON offer (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE car_vehicle_type');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E9D86650F');
        $this->addSql('DROP INDEX IDX_29D6873E9D86650F ON offer');
        $this->addSql('ALTER TABLE offer CHANGE user_id_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E9D86650F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_29D6873E9D86650F ON offer (user_id)');
    }
}
