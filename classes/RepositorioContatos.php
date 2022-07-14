<?php

include_once "../classes/Contato.php";

class RepositorioContatos
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function salvar(Contato $contato)
    {
        $nome = $contato->getNome();
        $telefone = $contato->getTelefone();
        $email = $contato->getEmail();

        $sqlSalvar = "INSERT INTO contatos
        (nome, telefone, email)
        VALUES
        (
        '{$nome}',
        '{$telefone}',
        '{$email}'
        )
        ";

        $this->mysqli->query($sqlSalvar);
    }

    public function atualizar(Contato $contato)
    {
        $id = $contato->getId();
        $nome = $contato->getNome();
        $telefone = $contato->getTelefone();
        $email = $contato->getEmail();
        
        $sqlAtualizar = "
            UPDATE contatos SET
            nome = '{$nome}',
            telefone = '{$telefone}',
            email = '{$email}'
            WHERE id = {$id}
        ";
            
        $this->mysqli->query($sqlAtualizar);
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
        $sqlBusca = "SELECT * FROM contatos";

        $dados = $this->mysqli->query($sqlBusca);

        $contatos = [];
        
        while ($contato = mysqli_fetch_assoc($dados)) {
            $novoContato = new Contato();
            $novoContato->setId($contato['id']);
            $novoContato->setNome($contato['nome']);
            $novoContato->setTelefone($contato['telefone']);
            $novoContato->setEmail($contato['email']);
            $contatos[] = $novoContato;
        }

        return $contatos;
    }

    private function buscarContato(int $id)
    {
        $sqlBusca = "SELECT * FROM contatos WHERE id = {$id}";
        $resultado = $this->mysqli->query($sqlBusca);
        $contato = $resultado->fetch_object('Contato');
        return $contato;
    }

    public function remover(int $id)
    {
        $sqlRemover = "DELETE FROM contatos WHERE id = {$id}";

        $this->mysqli->query($sqlRemover);
    }
}
