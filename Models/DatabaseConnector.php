<?php
require_once("vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as DBC;

class DatabaseConnector
{
    private $dbc;

    public function __construct()
    {
        $this->dbc = new DBC();
        $this->dbc->addConnection(CONNECTION_STRING);
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