<?php

use Illuminate\Support\Collection;

class UserService
{
    private DatabaseConnector $dbContext;

    public function __construct()
    {
        $this->dbContext = new DatabaseConnector();
    }

    /**
     * get all users
     * return Collection of users
     * @return Illuminate\Support\Collection
     */
    public function getUsers(): Collection
    {
        return $this->dbContext->getDbc()::table("users")->select("e_mail")->get();
    }

<<<<<<< HEAD
    public function getUserById($id)
=======

    /**
     * get user by id
     * return selected user or NULL
     * @param int $id
     * @return stdClass|null
     */
    private function getUserById(int $id): ?stdClass
>>>>>>> Dev
    {
        return $this->dbContext->getDbc()::table('users')->where("ID", $id)->select("e_mail")->first();
    }

    /**
     * get user by email
     * return selected user or NULL
     * @param string $email
     * @return stdClass|null
     */
    private function getUserByEmail(string $email): ?stdClass
    {
        return $this->dbContext->getDbc()::table('users')->where("e_mail", $email)->select("e_mail")->first();
    }

    /**
     * update user data
     * return true if user inserted
     * false if user not inserted
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function insertUser(string $email, string $password): bool
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

    /**
     * update user data
     * return affected rows number
     * @param int $id
     * @param string $email
     * @param string $password
     * @return int
     */
    public function updateUser(int $id, string $email, string $password): int
    {
        return $this->dbContext->getDbc()::table('users')
            ->where('ID', $id)
            ->update(['e_mail' => $email, 'password', $password]);
    }

    /**
     * delete user from database.
     * return affected rows number
     * @param int $id
     * @return int
     */
    public function removeUser(int $id): int
    {
        return $this->dbContext->getDbc()::table('users')->where('ID', $id)->delete();
    }

}