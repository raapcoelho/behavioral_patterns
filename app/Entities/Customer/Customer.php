<?php

namespace App\Entities\Customer;

use App\Entities\Email;

class Customer {
    public string $name;
    public Email $email;

    public function __construct(string $name, Email $email) {
        $this->name = $name;
        $this->email = $email;
    }
}