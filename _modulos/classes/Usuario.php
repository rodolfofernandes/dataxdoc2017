<?php
class Usuario {
    public $idUsuario;
    public $nome;
    public $login;
    public $alcada;
    public $dtNascimento;
    public $cpf;
    public $email;
    public $senha;
    public $genero;
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        return $this->login;
    }

    function getAlcada() {
        return $this->alcada;
    }

    function getDtNascimento() {
        return $this->dtNascimento;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getGenero() {
        return $this->genero;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setAlcada($alcada) {
        $this->alcada = $alcada;
    }

    function setDtNascimento($dtNascimento) {
        $this->dtNascimento = $dtNascimento;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }



    
}
