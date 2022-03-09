<?php
require_once("vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as DBC;

class DatabaseConnector
{
    private $dbc;

    public function __construct()
    {
        $this->dbc = new DBC();
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