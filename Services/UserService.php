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




    /**
     * get user by id
     * return selected user or NULL
     * @param int $id
     * @return stdClass|null
     */
    public function getUserById(int $id): ?stdClass

    {
        return $this->dbContext->getDbc()::table('users')->where("ID", $id)->select("e_mail","user_password")->first();
    }

    /**
     * get user by email
     * return selected user or NULL
     * @param string $email
     * @return stdClass|null
     */
    private function getUserByEmail(string $email): ?stdClass
    {
        return $this->dbContext->getDbc()::table('users')->where("e_mail", $email)->select("e_mail","user_password","ID")->first();
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
        $userID=0;
        $hashedPassword=sha1($password);
        if (is_null($selectedUser)) {
            $newUser = ["e_mail" => $email, "user_password" => $hashedPassword];
//            $this->dbContext->getDbc()::table('users')->insert($newUser);
            $userID = $this->dbContext->getDbc()::table('users')->insertGetId($newUser);
        }
        return $userID;
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
    /**
     * is_auth
     * return affected rows number
     *
     * @param string $email
     * @param string $password
     * @return int | null
     */
    public function is_authUser(string $email,string $password) : int
    {
        $userinfo=$this->getUserByEmail($email);
        if(is_null($userinfo))
        {
                return 0;
        }else{
            $regPassword=$userinfo->user_password;
            $hashedPassword=sha1($password);
            if(strcmp($regPassword,$hashedPassword)!=0)
            {
                return 0;
            }else
            {
                return $userinfo->ID;
            }
        }

    }
}