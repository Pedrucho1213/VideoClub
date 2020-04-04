<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200331215055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, origina_title VARCHAR(100) NOT NULL, original_language VARCHAR(50) NOT NULL, genre VARCHAR(80) NOT NULL, release_data DATE NOT NULL, poster_path VARCHAR(255) NOT NULL, overview LONGTEXT NOT NULL, video_path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, cve_people_id INT NOT NULL, cve_film_id INT NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_27BA704BC9E8EE21 (cve_people_id), INDEX IDX_27BA704B8071F76 (cve_film_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, telephone INT NOT NULL, cp INT NOT NULL, adress LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, cve_people_id INT NOT NULL, user VARCHAR(255) NOT NULL, password LONGTEXT NOT NULL, role TINYINT(1) NOT NULL, photo_path LONGTEXT NOT NULL, registre DATETIME NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649C9E8EE21 (cve_people_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704BC9E8EE21 FOREIGN KEY (cve_people_id) REFERENCES people (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B8071F76 FOREIGN KEY (cve_film_id) REFERENCES films (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C9E8EE21 FOREIGN KEY (cve_people_id) REFERENCES people (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B8071F76');
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704BC9E8EE21');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C9E8EE21');
        $this->addSql('DROP TABLE films');
        $this->addSql('DROP TABLE history');
        $this->addSql('DROP TABLE people');
        $this->addSql('DROP TABLE user');
    }
}
