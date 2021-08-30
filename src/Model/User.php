<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

class User
{
    public $id;
    public $anonymous;
    public $username;
    public $first_name;
    public $last_name;
    public $sex;
    public $created_at;
    public $updated_at;

    public static function update(
        string $id,
        string $username,
        string $first_name,
        string $last_name,
        string $sex
    ): self {
        $user = new self();
        $user->id = $id;
        $user->username = $username;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->sex = $sex;

        return $user;
    }
}