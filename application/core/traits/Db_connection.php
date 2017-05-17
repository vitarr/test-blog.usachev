<?php

/**
 * Set connection to database
 * settings in config.php (application/)
 *
 * @author Victor
 */
trait Db_connection
{
    /**
     * @var
     */
    protected $db;

    /**
     * connect to DB
     */
    protected function db_connect()
    {
        $this->db = new mysqli(DB['host'], DB['user'], DB['password'], DB['db']);
        $this->db->query("SET CHARSET utf8");
    }

}