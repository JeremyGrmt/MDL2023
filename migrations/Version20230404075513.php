<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230404075513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE atelier (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, nbplaces INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier_theme (atelier_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_AEB6D34382E2CF35 (atelier_id), INDEX IDX_AEB6D34359027487 (theme_id), PRIMARY KEY(atelier_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier_vacation (atelier_id INT NOT NULL, vacation_id INT NOT NULL, INDEX IDX_2652DD9082E2CF35 (atelier_id), INDEX IDX_2652DD9054DD8D72 (vacation_id), PRIMARY KEY(atelier_id, vacation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chambre (id INT AUTO_INCREMENT NOT NULL, hotel_id INT DEFAULT NULL, libelle VARCHAR(50) NOT NULL, tarif DOUBLE PRECISION NOT NULL, INDEX IDX_C509E4FF3243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(50) NOT NULL, cp INT NOT NULL, mail VARCHAR(50) NOT NULL, nom VARCHAR(20) NOT NULL, tel VARCHAR(10) NOT NULL, ville VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, chambre_id INT DEFAULT NULL, restauration_id INT DEFAULT NULL, INDEX IDX_5E90F6D69B177F54 (chambre_id), INDEX IDX_5E90F6D67C6CB929 (restauration_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_atelier (inscription_id INT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_C86AEECF5DAC5993 (inscription_id), INDEX IDX_C86AEECF82E2CF35 (atelier_id), PRIMARY KEY(inscription_id, atelier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restauration (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, libelle VARCHAR(20) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vacation (id INT AUTO_INCREMENT NOT NULL, date_heure_debut DATETIME NOT NULL, date_heure_fin DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34382E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34359027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_vacation ADD CONSTRAINT FK_2652DD9082E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_vacation ADD CONSTRAINT FK_2652DD9054DD8D72 FOREIGN KEY (vacation_id) REFERENCES vacation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FF3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D69B177F54 FOREIGN KEY (chambre_id) REFERENCES chambre (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D67C6CB929 FOREIGN KEY (restauration_id) REFERENCES restauration (id)');
        $this->addSql('ALTER TABLE inscription_atelier ADD CONSTRAINT FK_C86AEECF5DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_atelier ADD CONSTRAINT FK_C86AEECF82E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34382E2CF35');
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34359027487');
        $this->addSql('ALTER TABLE atelier_vacation DROP FOREIGN KEY FK_2652DD9082E2CF35');
        $this->addSql('ALTER TABLE atelier_vacation DROP FOREIGN KEY FK_2652DD9054DD8D72');
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FF3243BB18');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D69B177F54');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D67C6CB929');
        $this->addSql('ALTER TABLE inscription_atelier DROP FOREIGN KEY FK_C86AEECF5DAC5993');
        $this->addSql('ALTER TABLE inscription_atelier DROP FOREIGN KEY FK_C86AEECF82E2CF35');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE atelier_theme');
        $this->addSql('DROP TABLE atelier_vacation');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE inscription_atelier');
        $this->addSql('DROP TABLE restauration');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE vacation');
    }
}
