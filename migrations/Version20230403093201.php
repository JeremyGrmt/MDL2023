<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230403093201 extends AbstractMigration
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
        $this->addSql('CREATE TABLE chambre (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, tarif DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34382E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34359027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_vacation ADD CONSTRAINT FK_2652DD9082E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_vacation ADD CONSTRAINT FK_2652DD9054DD8D72 FOREIGN KEY (vacation_id) REFERENCES vacation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotel ADD chambre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED99B177F54 FOREIGN KEY (chambre_id) REFERENCES chambre (id)');
        $this->addSql('CREATE INDEX IDX_3535ED99B177F54 ON hotel (chambre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED99B177F54');
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34382E2CF35');
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34359027487');
        $this->addSql('ALTER TABLE atelier_vacation DROP FOREIGN KEY FK_2652DD9082E2CF35');
        $this->addSql('ALTER TABLE atelier_vacation DROP FOREIGN KEY FK_2652DD9054DD8D72');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE atelier_theme');
        $this->addSql('DROP TABLE atelier_vacation');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP INDEX IDX_3535ED99B177F54 ON hotel');
        $this->addSql('ALTER TABLE hotel DROP chambre_id');
    }
}
