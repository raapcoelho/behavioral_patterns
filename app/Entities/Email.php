<?php

namespace App\Entities;

class Email {
    private string $address;

    public function __construct(string $address) {
        if ($this->isValidEmail($address)) {
            $this->address = $address;
        } else {
            throw new \InvalidArgumentException('Endereço de e-mail inválido');
        }
    }

    public function getAddress(): string {
        return $this->address;
    }

    private function isValidEmail(string $email): bool {
        // Utilize uma expressão regular para validar o formato do e-mail.
        // Aqui está um exemplo simples, mas você pode usar uma expressão regular mais abrangente.
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
