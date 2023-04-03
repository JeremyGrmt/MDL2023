<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230403104435 extends AbstractMigration
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
        $this->addSql('CREATE TABLE inscrition_atelier (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscrition_atelier_atelier (inscrition_atelier_id INT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_DDB17DF6E0FB820A (inscrition_atelier_id), INDEX IDX_DDB17DF682E2CF35 (atelier_id), PRIMARY KEY(inscrition_atelier_id, atelier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscrition_atelier_inscription (inscrition_atelier_id INT NOT NULL, inscription_id INT NOT NULL, INDEX IDX_D48622BBE0FB820A (inscrition_atelier_id), INDEX IDX_D48622BB5DAC5993 (inscription_id), PRIMARY KEY(inscrition_atelier_id, inscription_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34382E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34359027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_vacation ADD CONSTRAINT FK_2652DD9082E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_vacation ADD CONSTRAINT FK_2652DD9054DD8D72 FOREIGN KEY (vacation_id) REFERENCES vacation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FF3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE inscrition_atelier_atelier ADD CONSTRAINT FK_DDB17DF6E0FB820A FOREIGN KEY (inscrition_atelier_id) REFERENCES inscrition_atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscrition_atelier_atelier ADD CONSTRAINT FK_DDB17DF682E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscrition_atelier_inscription ADD CONSTRAINT FK_D48622BBE0FB820A FOREIGN KEY (inscrition_atelier_id) REFERENCES inscrition_atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscrition_atelier_inscription ADD CONSTRAINT FK_D48622BB5DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34382E2CF35');
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34359027487');
        $this->addSql('ALTER TABLE atelier_vacation DROP FOREIGN KEY FK_2652DD9082E2CF35');
        $this->addSql('ALTER TABLE atelier_vacation DROP FOREIGN KEY FK_2652DD9054DD8D72');
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FF3243BB18');
        $this->addSql('ALTER TABLE inscrition_atelier_atelier DROP FOREIGN KEY FK_DDB17DF6E0FB820A');
        $this->addSql('ALTER TABLE inscrition_atelier_atelier DROP FOREIGN KEY FK_DDB17DF682E2CF35');
        $this->addSql('ALTER TABLE inscrition_atelier_inscription DROP FOREIGN KEY FK_D48622BBE0FB820A');
        $this->addSql('ALTER TABLE inscrition_atelier_inscription DROP FOREIGN KEY FK_D48622BB5DAC5993');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE atelier_theme');
        $this->addSql('DROP TABLE atelier_vacation');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP TABLE inscrition_atelier');
        $this->addSql('DROP TABLE inscrition_atelier_atelier');
        $this->addSql('DROP TABLE inscrition_atelier_inscription');
    }
}
