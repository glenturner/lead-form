<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180722061605 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE phones (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE leads (id INT AUTO_INCREMENT NOT NULL, phone_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, email VARCHAR(255) NOT NULL, postal_code VARCHAR(15) NOT NULL, UNIQUE INDEX UNIQ_179045523B7323CB (phone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admins (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(150) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE leads ADD CONSTRAINT FK_179045523B7323CB FOREIGN KEY (phone_id) REFERENCES phones (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE leads DROP FOREIGN KEY FK_179045523B7323CB');
        $this->addSql('DROP TABLE phones');
        $this->addSql('DROP TABLE leads');
        $this->addSql('DROP TABLE admins');
    }
}
