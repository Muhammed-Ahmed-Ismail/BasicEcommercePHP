<?php
require_once("vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as DBC;

class DatabaseConnector
{
    private $dbc;

    public function __construct()
    {
        $this->dbc = new DBC();
        $this->dbc->addConnection([
            "driver" => _driver_,
            "host" => _host_,
            "database" => _database_,
            "username" => _username_,
            "password" => _password_
        ]);
        $this->dbc->setAsGlobal();
        $this->dbc->bootEloquent();
    }

    /**
     * @return DBC
     */

    public function getDbc()
    {
        return $this->dbc;
    }
}