<?php

namespace App\Services\User;

use App\Models\User;

class Create
{
    public function handle(string $name, string $email, string $password): User
    {
        $exists = User::query()
            ->where('email', $email)
            ->exists();

        if ($exists) {
            throw new \DomainException('User already exists');
        }

        $user = User::create($name, $email, $password);

        if (!$user->save()) {
            throw new \DomainException('User saving failed');
        }

        return $user;
    }
}
