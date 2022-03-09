<?php

class UserService
{
    private DatabaseConnector $dbContext;

    public function __construct()
    {
        $this->dbContext = new DatabaseConnector();
    }

    public function getUsers(): array
    {
        $users = array();

        $result = $this->dbContext->getDbc()::table("users")->get();
        foreach ($result as $data) {
            $tempUser = new UserDto();
            $tempUser->setId($data->ID);
            $tempUser->setEmail($data->e_mail);
            $users[] = $tempUser;
        }
        return $users;
    }

    public function getUserById($id): UserDto
    {
        $selectedUser = new UserDto();
        $result = $this->dbContext->getDbc()::table('users')->where("ID", $id)->first();
        $selectedUser->setId($result->ID);
        $selectedUser->setEmail($result->e_mail);
        return $selectedUser;
    }

    public function getUserByEmail($email)
    {
        $selectedUser = new UserDto();
        $result = $this->dbContext->getDbc()::table('users')->where("e_mail", $email)->first();
        $selectedUser->setId($result->ID);
        $selectedUser->setEmail($result->e_mail);
        return $selectedUser;
    }

}