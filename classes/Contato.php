<?php

class Contato
{
    private $id = 0;

    private $nome = '';

    private $telefone = '';

    private $email = '';

    public function setId(int $id)
    {
        $this->id = $id;
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
