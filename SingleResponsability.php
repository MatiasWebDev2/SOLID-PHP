<?php
declare(strict_types=1);

// Single responsability:
# No caso abaixo o usuário fica separado da lógica para autenticar, salvar e notificar
# Se a lógica para autenticar mudar, somente a classe Auth precisa ser alterada.

class User {

    public string $nome;
    public string $senha;

}

class Repository {

    public function salvar($data) : void {
        // Lógica de salvar
    }
}

class Auth {
    public function login() : void {
        // Lógica para autenticar
    }
}

class EmailService {
    public function enviar($addr, $msg) : void {
        // Lógica de login
    }
}