<?php

/* CREATE DATABASE `contatos` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */

/*
CREATE TABLE `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
*/

include_once "../classes/Contato.php";

class RepositorioContatos
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar(Contato $contato)
    {
        $sqlInsert = "
            INSERT INTO contatos
            (nome, telefone, email)
            VALUES
            (:nome, :telefone, :email )
        ";

        $query = $this->pdo->prepare($sqlInsert);

        $query->execute([
            'nome' => strip_tags($contato->getNome()),
            'telefone' => strip_tags($contato->getTelefone()),
            'email' => strip_tags($contato->getEmail())
        ]);
    }

    public function atualizar(Contato $contato)
    {
        $id = $contato->getId();
        $nome = $contato->getNome();
        $telefone = $contato->getTelefone();
        $email = $contato->getEmail();
        
        $sqlUpdate = "
            UPDATE contatos SET
                nome = :nome,
                telefone = :telefone,
                email = :email
            WHERE id = :id
        ";
            
        $query = $this->pdo->prepare($sqlUpdate);

        $query->execute([
            'nome' => strip_tags($contato->getNome()),
            'telefone' => strip_tags($contato->getTelefone()),
            'email' => strip_tags($contato->getEmail()),
            'id' => $contato->getId(),
        ]);
    }

    public function buscar(int $id = 0)
    {
        if ($id > 0) {
            return $this->buscarContato($id);
        } else {
            return $this->buscarContatos();
        }
    }

    private function buscarContatos()
    {
        $sqlSelect = "SELECT * FROM contatos";

        $dados = $this->pdo->query(
            $sqlSelect,
            PDO::FETCH_CLASS,
            'Contato'
        );

        $contatos = [];
        
        foreach ($dados as $contato) {
            $novoContato = new Contato();
            $novoContato->setId($contato->getId());
            $novoContato->setNome($contato->getNome());
            $novoContato->setTelefone($contato->getTelefone());
            $novoContato->setEmail($contato->getEmail());
            $contatos[] = $novoContato;
        }

        return $contatos;
    }

    private function buscarContato(int $id)
    {
        $sqlSelect = "SELECT * FROM contatos WHERE id = :id";
        $query = $this->pdo->prepare($sqlSelect);
        $query->execute([
            "id" => $id,
        ]);

        $contato = $query->fetchObject('Contato');
        return $contato;
    }

    public function remover(int $id)
    {
        $sqlDelete = "DELETE FROM contatos WHERE id = :id";

        $query = $this->pdo->prepare($sqlDelete);

        $query->execute([
            'id' => $id,
        ]);
    }
}
