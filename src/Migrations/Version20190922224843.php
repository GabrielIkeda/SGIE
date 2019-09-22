<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190922224843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE curso (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, instituicao_id INT DEFAULT NULL, duracao DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_CA3B40EC6BF700BD (status_id), INDEX IDX_CA3B40ECB05E5EEA (instituicao_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instituicao (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, cnpj VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_7CFF8F696BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aluno (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, curso_id INT DEFAULT NULL, cpf VARCHAR(15) NOT NULL, data_nascimento DATETIME NOT NULL, email VARCHAR(255) NOT NULL, celular VARCHAR(20) NOT NULL, endereco VARCHAR(255) NOT NULL, numero INT NOT NULL, bairro VARCHAR(255) NOT NULL, cidade VARCHAR(255) NOT NULL, uf VARCHAR(2) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_67C971006BF700BD (status_id), INDEX IDX_67C9710087CB4A1F (curso_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE curso ADD CONSTRAINT FK_CA3B40EC6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE curso ADD CONSTRAINT FK_CA3B40ECB05E5EEA FOREIGN KEY (instituicao_id) REFERENCES instituicao (id)');
        $this->addSql('ALTER TABLE instituicao ADD CONSTRAINT FK_7CFF8F696BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE aluno ADD CONSTRAINT FK_67C971006BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE aluno ADD CONSTRAINT FK_67C9710087CB4A1F FOREIGN KEY (curso_id) REFERENCES curso (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aluno DROP FOREIGN KEY FK_67C9710087CB4A1F');
        $this->addSql('ALTER TABLE curso DROP FOREIGN KEY FK_CA3B40ECB05E5EEA');
        $this->addSql('ALTER TABLE curso DROP FOREIGN KEY FK_CA3B40EC6BF700BD');
        $this->addSql('ALTER TABLE instituicao DROP FOREIGN KEY FK_7CFF8F696BF700BD');
        $this->addSql('ALTER TABLE aluno DROP FOREIGN KEY FK_67C971006BF700BD');
        $this->addSql('DROP TABLE curso');
        $this->addSql('DROP TABLE instituicao');
        $this->addSql('DROP TABLE aluno');
        $this->addSql('DROP TABLE status');
    }
}
