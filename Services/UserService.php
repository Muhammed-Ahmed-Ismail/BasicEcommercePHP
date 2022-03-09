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
        foreach ($result as $user => $data) {
            $tempUser = new UserDto();
            $tempUser->setId($data->ID);
            $tempUser->setEmail($data->e_mail);
            $users[] = $tempUser;
        }
        return $users;
    }

}