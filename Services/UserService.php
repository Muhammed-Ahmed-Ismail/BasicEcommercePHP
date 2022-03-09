<?php

use Illuminate\Support\Collection;

class UserService
{
    private DatabaseConnector $dbContext;

    public function __construct()
    {
        $this->dbContext = new DatabaseConnector();
    }

    public function getUsers(): Collection
    {
        return $this->dbContext->getDbc()::table("users")->select("e_mail")->get();
    }

    private function getUserById($id)
    {
        return $this->dbContext->getDbc()::table('users')->where("ID", $id)->select("e_mail")->get()->first();
    }

    private function getUserByEmail($email)
    {
        return $this->dbContext->getDbc()::table('users')->where("ID", $email)->select("e_mail")->get()->first();
    }

    public function insertUser($email, $password): bool
    {
        $selectedUser = $this->getUserByEmail($email);
        $isInserted = false;

        if (is_null($selectedUser)) {
            $newUser = ["e_mail" => $email, "password" => $password];
            $this->dbContext->getDbc()::table('users')->insert($newUser);
            $isInserted = true;
        }
        return $isInserted;
    }

    public function updateUser($id, $email, $password): int
    {
        return $this->dbContext->getDbc()::table('users')
            ->where('ID', $id)
            ->update(['e_mail' => $email, 'password', $password]);
    }

    public function removeUser($id): int
    {
        return $this->dbContext->getDbc()::table('users')->where('ID', $id)->delete();
    }

}